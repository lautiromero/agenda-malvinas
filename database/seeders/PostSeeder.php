<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Image;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* $posts = Post::factory(50)->create();
        foreach($posts as $post){
            //creamos una imagen por cada post
            Image::factory(1)->create([
                'imageable_id' => $post->id,
                'imageable_type' => Post::class
            ]);
            //creamos aleatoriamente entre 0 y 4 comentarios por cada post
            $cant = rand(0, 4);

            if ($cant > 0) {
                Comment::factory($cant)->create([
                    'post_id' => $post->id
                ]);
            }

            $post->tags()->attach([
                rand(1, 2),
                rand(3, 4)
            ]);
        } */

        $old_posts = DB::connection('mysql2')->table('wppe_posts')
                    ->where('post_status', 'publish')
                    ->where('post_type', 'post')
                    ->get();

        foreach ($old_posts as $post) {
            DB::connection('mysql')->table('posts')->insert([
                'id' => $post->ID,
                'name'     => Str::limit($post->post_title, 252),
                'slug'    => Str::slug(Str::limit($post->post_title, 252)),
                'extract' => Str::limit($post->post_title, 252),
                'body' => $post->post_content,
                'status' => 2,
                'user_id' => 1,
                'category_id' => 1,
                'img_desc' => 'Sin descripción de imagen',
                'created_at' => $post->post_date
            ]);
        }

        //traemos las relaciones de la tabla postmeta
        $old_links = DB::connection('mysql2')->table('wppe_postmeta')
        ->where('meta_key', '_wp_attached_file')
        ->get();

        $images = array();

        foreach ($old_links as $link) {
            $images[$link->post_id] = $link->meta_value;
        }

        //traemos todas las imagenes de la tabla post
        $old_images = DB::connection('mysql2')->table('wppe_posts')
        ->where('post_mime_type', 'image/jpeg')
        ->where('post_type', 'attachment')
        ->get();

                    
        foreach ($old_images as $image) {
            if(isset($images[$image->ID]) && $images[$image->ID] != null) {

                DB::connection('mysql')->table('images')->insert([
                    'imageable_id' => $image->post_parent,
                    'imageable_type' => Post::class,
                    'url' => 'wp-content/uploads/' . $images[$image->ID]
                ]);
            }
        }
    }
}

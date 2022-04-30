<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Image;
use App\Models\Comment;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::factory(300)->create();
        foreach($posts as $post){
            //creamos una imagen por cada post
            Image::factory(1)->create([
                'imageable_id' => $post->id,
                'imageable_type' => Post::class
            ]);
            //creamos aleatoriamente entre 0 y 5 comentarios por cada post
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
        }
    }
}

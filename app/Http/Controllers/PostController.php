<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Comment;

class PostController extends Controller
{
    public function index()
    {
        $main = Post::where('status', 2)->latest()->limit(6)->get();

        $actual = Post::where('status', 2)->latest()->offset(6)->limit(9)->get();

        //Buscamos el tag con nombre importante y lo convertimos en un objeto
        $important_tag = Tag::where('name', 'importante')->first();

        //Formulamos la query con los posts relacionados
        $importants = $important_tag->posts()->where('status', 2)->latest()->limit(2)->get();

        $opinion_tag = Tag::where('slug', 'opinion')->first();

        $opinions = $opinion_tag->posts()->where('status', 2)->latest()->limit(5)->get();
        
        $more = Post::where('status', 2)->latest()->offset(15)->limit(6)->get();;

        //4 Posts mas vistos de los ultimos 30 dias
        $vieweds = Post::where('status', 2)
        ->where('created_at', '>', now()->subDays(30)->endOfDay())
        ->orderBy('reads', 'desc')->limit(4)->get();

        //Buscamos el tag con nombre video y lo convertimos en un objeto
        $video_tag = Tag::where('name', 'video')->first();

        //Formulamos la query con los posts relacionados
        $video = $video_tag->posts()->where('status', 2)->latest()->first();

        
        return view('posts.index', compact('main', 'actual', 'importants', 'opinions', 'more', 'vieweds', 'video'));
    }

    public function show(Post $post)
    {
        
        //incrementamos las vistas
        $post->incrementReadCount();

        //seteamos los meta tags
        meta()
        ->set('title', $post->name)
        ->set('og:type', 'article')
        ->set('og:title', $post->name)
        ->set('og:description', $post->extract)
        ->set('og:image', Storage::url($post->image->url))
        ->set('description', $post->extract);

        //traemos los ultimos 3 post de la misma categoria
        $otras_cat = Post::where('status', 2)
        ->where('category_id', $post->category_id)
        ->where('id', '!=', $post->id)
        ->latest()->limit(3)->get();

        //9 Posts mas vistos de los ultimos 30 dias
        $vieweds = Post::where('status', 2)
        ->where('created_at', '>', now()->subDays(30)->endOfDay())
        ->orderBy('reads', 'desc')->limit(9)->get();

        //Mas leidas de la misma categorìa
        $cat_vieweds = Post::where('status', 2)
        ->where('created_at', '>', now()->subDays(30)->endOfDay())
        ->where('category_id', $post->category_id)
        ->orderBy('reads', 'desc')->limit(4)->get();
        
        //traemos los comentarios que pertenecen a este post
        $comments = Comment::where('post_id', $post->id)->latest()->get();

        return view('posts.show', compact('post', 'otras_cat', 'vieweds', 'comments', 'cat_vieweds'));
    }

    public function showById($age, $month, $day, $id)
    {
        $post = Post::find($id);
        //incrementamos las vistas
        $post->incrementReadCount();

        //seteamos los meta tags
        meta()
        ->set('title', $post->name)
        ->set('og:type', 'article')
        ->set('og:title', $post->name)
        ->set('og:description', $post->extract)
        ->set('og:image', Storage::url($post->image->url))
        ->set('description', $post->extract);

        //traemos los ultimos 3 post de la misma categoria
        $otras_cat = Post::where('status', 2)
        ->where('category_id', $post->category_id)
        ->where('id', '!=', $post->id)
        ->latest()->limit(3)->get();

        //9 Posts mas vistos de los ultimos 30 dias
        $vieweds = Post::where('status', 2)
        ->where('created_at', '>', now()->subDays(30)->endOfDay())
        ->orderBy('reads', 'desc')->limit(9)->get();

        //Mas leidas de la misma categorìa
        $cat_vieweds = Post::where('status', 2)
        ->where('created_at', '>', now()->subDays(30)->endOfDay())
        ->where('category_id', $post->category_id)
        ->orderBy('reads', 'desc')->limit(4)->get();
        
        //traemos los comentarios que pertenecen a este post
        $comments = Comment::where('post_id', $post->id)->latest()->get();

        return view('posts.show', compact('post', 'otras_cat', 'vieweds', 'comments', 'cat_vieweds'));
    }

    public function search(Request $request)
    {
        $texto = trim($request->get('texto'));

        $posts = Post::where('status', 2)
        ->where('name', 'LIKE', '%' .$texto. '%')
        ->orWhere('extract', 'LIKE', '%' .$texto. '%')
        ->latest()
        ->simplePaginate(10);

        return view('posts.search', compact('posts', 'texto'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

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

        $most_viewed = 4;

        $video = 1;
        
        return view('posts.index', compact('main', 'actual', 'importants', 'opinions', 'more'));
    }
}

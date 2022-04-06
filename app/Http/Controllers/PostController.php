<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $main = Post::where('status', 2)->latest()->limit(6)->get();
        
        return view('posts.index', compact('main'));
    }
}

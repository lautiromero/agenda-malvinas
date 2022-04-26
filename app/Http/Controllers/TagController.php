<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function show(Tag $tag)
    {
        $main = $tag->posts()->where('status', 2)->latest()->limit(6)->get();

        $more = $tag->posts()->where('status', 2)->latest()->offset(6)->limit(9)->get();

        $name = $tag->name;

        //Mas leidas
        $tag_vieweds = $tag->posts()->where('status', 2)
        ->where('posts.created_at', '>', now()->subDays(30)->endOfDay())
        ->orderBy('reads', 'desc')->limit(4)->get();

        return view('posts.tag', compact('main', 'more', 'tag_vieweds' , 'name'));
    }
}

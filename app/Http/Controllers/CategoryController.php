<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $main = $category->posts()->where('status', 2)->latest()->limit(6)->get();

        $more = $category->posts()->where('status', 2)->latest()->offset(6)->limit(9)->get();

        $name = $category->name;

        //Mas leidas
        $cat_vieweds = $category->posts()->where('status', 2)
        ->where('created_at', '>', now()->subDays(30)->endOfDay())
        ->orderBy('reads', 'desc')->limit(4)->get();

        return view('posts.category', compact('main', 'more', 'cat_vieweds', 'name'));
    }
}

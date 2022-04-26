<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Post;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->body = $request->get('comment_body');
        $comment->user()->associate($request->user());
        $comment->post()->associate($request->get('post_id'));
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($comment);

        return back();
    }
}

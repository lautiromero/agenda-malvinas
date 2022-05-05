<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.comments.index')->only('index');
        $this->middleware('can:admin.comments.destroy')->only('destroy');
    }

    public function index()
    {
        return view('admin.comments.index');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('admin.comments.index')->with('info', 'El comentario se eliminó correctamente.');
    }
}

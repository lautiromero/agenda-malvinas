<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if(auth()->user()->roles->pluck('name')[0] ?? '' === 'admin')
        {
            $posts = Post::where('name', 'LIKE', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate();
        } else {
            //traemos los posts del usuario actual
            $posts = Post::where('name', 'LIKE', '%' . $this->search . '%')
                        ->where('user_id', auth()->user()->id)
                        ->orderBy('id', 'desc')
                        ->paginate();
        }

        //traemos los posts del usuario actual
        //$posts = Post::where('user_id', auth()->user()->id)->latest()->paginate();

        return view('livewire.admin.post-index', compact('posts'));
    }
}

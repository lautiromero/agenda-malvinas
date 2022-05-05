<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Comment;
use Livewire\WithPagination;

class CommentIndex extends Component
{
    use WithPagination;

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $comments = Comment::where('body', 'LIKE', '%' . $this->search . '%')
                    ->paginate();

        return view('livewire.admin.comment-index', compact('comments'));
    }
}

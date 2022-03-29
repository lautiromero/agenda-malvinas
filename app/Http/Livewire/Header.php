<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class Header extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.header', compact('categories'));
    }
}

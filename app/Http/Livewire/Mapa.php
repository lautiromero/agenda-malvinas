<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class Mapa extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.mapa', compact('categories'));
    }
}

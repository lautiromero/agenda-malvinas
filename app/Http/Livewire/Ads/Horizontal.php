<?php

namespace App\Http\Livewire\Ads;

use Livewire\Component;
use Illuminate\Support\Arr;
use App\Models\Ad;

class Horizontal extends Component
{
    public function render()
    {
        $ad = Ad::where('type', 'horizontal')->inRandomOrder()->first();

        return view('livewire.ads.horizontal', compact('ad'));
    }
}

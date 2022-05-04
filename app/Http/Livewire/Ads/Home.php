<?php

namespace App\Http\Livewire\Ads;

use Livewire\Component;
use App\Models\Ad;

class Home extends Component
{
    public function render()
    {
        $ad = Ad::where('type', 'nota-home')->inRandomOrder()->first();

        return view('livewire.ads.horizontal', compact('ad'));
    }
}

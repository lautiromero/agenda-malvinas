<?php

namespace App\Http\Livewire\Ads;

use Livewire\Component;
use App\Models\Ad;

class Vertical extends Component
{
    public function render()
    {
        $ad = Ad::where('type', 'vertical')->inRandomOrder()->first();

        return view('livewire.ads.vertical', compact('ad'));
    }
}

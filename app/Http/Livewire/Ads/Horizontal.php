<?php

namespace App\Http\Livewire\Ads;

use Livewire\Component;
use Illuminate\Support\Arr;
use App\Models\Ad;

class Horizontal extends Component
{
    public $ad;

    public function mount($orden)
    {
        $this->ad = Ad::where('id', $orden)->first();

        return view('livewire.ads.horizontal', ['ad' => $this->ad]);
    }
}

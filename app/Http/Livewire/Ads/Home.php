<?php

namespace App\Http\Livewire\Ads;

use Livewire\Component;
use App\Models\Ad;

class Home extends Component
{
    public $ad;

    public function mount($orden)
    {
        $this->ad = Ad::where('id', $orden)->first();

        return view('livewire.ads.home', ['ad' => $this->ad]);
    }
}

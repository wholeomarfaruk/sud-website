<?php

namespace App\Livewire\Website\Offers;

use Livewire\Component;

class Offers extends Component
{
    public function render()
    {
        $offers = \App\Models\Offer::where('status', 1)->get();
        return view('livewire.website.offers.offers', compact('offers'))->layout('layouts.website.website');

    }
}

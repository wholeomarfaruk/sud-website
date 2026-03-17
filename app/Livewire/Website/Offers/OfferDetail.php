<?php

namespace App\Livewire\Website\Offers;

use Livewire\Component;

class OfferDetail extends Component
{
    public $offer;
    public function mount($id){
        $this->offer = \App\Models\Offer::find($id);
        if(!$this->offer){
            abort(404);
        }
        track_visit('offers', $id, $id);

    }
    public function render()
    {
        return view('livewire.website.offers.offer-detail')->layout('layouts.website.website');
    }
}

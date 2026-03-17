<?php

namespace App\Livewire\Website\Home;

use Livewire\Component;

class Home extends Component
{
       public function mount(){
        track_visit('static', null, 'home');
    }
    public function render()
    {
        $sliders = \App\Models\Slider::orderBy('sort_order', 'asc')->get();
        $featured_properties = \App\Models\FeaturedProperties::orderBy('sort_order', 'asc')->take(4)->get();
        $videos = \App\Models\Videos::orderBy('sort_order', 'asc')->take(4)->get();
        $partners = \App\Models\TrustedPartner::orderBy('sort_order', 'asc')->get();
        $properties = \App\Models\Property::orderBy('created_at', 'desc')->take(4)->get();
        return view('livewire.website.home.home', compact('sliders','featured_properties','videos','partners','properties'))->layout('layouts.website.website');
    }
}

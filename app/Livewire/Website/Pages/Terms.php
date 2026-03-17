<?php

namespace App\Livewire\Website\Pages;

use Livewire\Component;

class Terms extends Component
{
     public function mount(){
        track_visit('static', null, 'terms-and-conditions');

    }
    public function render()
    {
        return view('livewire.website.pages.terms')->layout('layouts.website.website');
    }
}

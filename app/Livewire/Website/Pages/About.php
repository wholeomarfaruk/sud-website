<?php

namespace App\Livewire\Website\Pages;

use Livewire\Component;

class About extends Component
{
    public function mount(){
        track_visit('static', null, 'about');

    }
    public function render()
    {
        return view('livewire.website.pages.about')->layout('layouts.website.website');
    }
}

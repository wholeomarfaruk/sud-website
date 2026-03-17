<?php

namespace App\Livewire\Website\Pages;

use Livewire\Component;

class PrivacyPolicy extends Component
{
     public function mount(){
        track_visit('static', null, 'privacy-policy');

    }
    public function render()
    {
        return view('livewire.website.pages.privacy-policy')->layout('layouts.website.website');
    }
}

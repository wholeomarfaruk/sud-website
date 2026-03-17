<?php

namespace App\Livewire\Website\Landowners;

use Livewire\Component;

class Landowners extends Component
{
    public function mount(){
        track_visit('static', null, 'landowners');
    }
    public function render()
    {
        return view('livewire.website.landowners.landowners')->layout('layouts.website.website');
    }
}

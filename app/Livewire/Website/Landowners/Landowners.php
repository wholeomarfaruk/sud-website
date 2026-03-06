<?php

namespace App\Livewire\Website\Landowners;

use Livewire\Component;

class Landowners extends Component
{
    public function render()
    {
        return view('livewire.website.landowners.landowners')->layout('layouts.website.website');
    }
}

<?php

namespace App\Livewire\Website\Clients;

use Livewire\Component;

class Clients extends Component
{
       public function mount(){
        track_visit('static', null, 'clients');
    }
    public function render()
    {
        return view('livewire.website.clients.clients')->layout('layouts.website.website');
    }
}

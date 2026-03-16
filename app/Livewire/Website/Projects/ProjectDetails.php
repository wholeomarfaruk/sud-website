<?php

namespace App\Livewire\Website\Projects;

use App\Models\Property;
use Livewire\Component;

class ProjectDetails extends Component
{
    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;  
        // dd($this->slug);
    }
    public function render()
    {

        $property= Property::where('slug', $this->slug)->first();
        if(!$property){
            abort(404);
        }
        // dd(json_decode($property->hero_image_id));
        return view('livewire.website.projects.project-details', compact('property'))->layout('layouts.website.website');
    }
}

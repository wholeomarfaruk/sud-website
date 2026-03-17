<?php

namespace App\Livewire\Website\Projects;

use App\Models\Location;
use App\Models\Property;
use Livewire\Component;
use Livewire\WithPagination;

class Projects extends Component
{
    use WithPagination;
    public $search = '';
    public $type = null;
    public $status;
    public $location;

    public function updatingSearch()
    {
        $this->resetPage(); // reset page on search update
    }
    public function mount()
    {
        track_visit('static', null, 'properties');
    }
    public function render()
    {
        $properties = Property::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->when($this->type, function ($query) {
                $query->where('project_type', $this->type);
            })
            ->when($this->status, function ($query) {
                $query->where('project_status', $this->status);
            })
            ->when($this->location, function ($query) {
                $query->where('location', $this->location);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(50); // use paginate

        $locations = Location::all();
        return view('livewire.website.projects.projects', compact('properties', 'locations'))->layout('layouts.website.website');
    }
}

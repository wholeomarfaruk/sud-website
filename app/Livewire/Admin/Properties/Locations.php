<?php

namespace App\Livewire\Admin\Properties;

use App\Models\Location;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class Locations extends Component
{
    use WithPagination;
    public $search = ''; // optional: for search/filter

    protected $paginationTheme = 'tailwind'; // 'bootstrap' also works
    public $locationModalOpen = false;
    public $is_edit = false;
    public $id, $name, $slug;
    public function render()
    {
        $locations = Location::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->orderBy('name', 'asc')
            ->paginate(20); // 10 items per page
        return view('livewire.admin.properties.locations', compact('locations'))->layout('layouts.admin.admin');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:locations,slug,' . $this->id,
        ]);
        $location = Location::updateOrCreate(
            ['id' => $this->id],
            [
                'name' => $this->name,
                'slug' => $this->slug,
            ]
        );
        if ($this->is_edit) {
            $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'Location Updated successfully'
            ]);
        } else {
            $this->reset();
            $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'Location created successfully'
            ]);
        }

    }
    public function delete($id)
    {
        $location = Location::find($id);
        if ($location) {
            $location->delete();
            $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'Location deleted successfully'
            ]);
        }
    }
    public function generateSlug()
    {
        if(!$this->name){
            $this->addError('slug', 'Name is required');
        }
        $this->slug = Str::slug($this->name);

    }
    public function edit($id)
    {
        $location = Location::find($id);
        if ($location) {
            $this->id = $location->id;
            $this->name = $location->name;
            $this->slug = $location->slug;
            $this->is_edit = true;
            $this->locationModalOpen = true;
        }
    }
}

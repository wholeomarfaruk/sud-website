<?php

namespace App\Livewire\Admin\Properties;

use App\Models\Location;
use App\Models\Property;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Properties extends Component
{
    use WithPagination;
    public $search = ''; // optional: for search/filter

    protected $paginationTheme = 'tailwind'; // 'bootstrap' also works

    public $status = null;
    public $location = null;

    public function updatingSearch()
    {
        $this->resetPage(); // reset page on search update
    }


    public function render()
    {
        $properties = Property::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            })
            ->when($this->location, function ($query) {
                $query->where('location_id', $this->location);
            })
            ->with('getLocation')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            // dd($properties);
            $locations= Location::all();
        return view('livewire.admin.properties.properties', compact('properties','locations'))->layout('layouts.admin.admin');
    }
     public function delete($id)
    {
        $Property = Property::find($id);
        if ($Property) {
            $Property->delete();
            $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'Location deleted successfully'
            ]);
        }
    }
}

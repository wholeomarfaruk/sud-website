<?php

namespace App\Livewire\Admin\Properties;

use App\Models\FeaturedProperties;
use App\Models\Property;
use Livewire\Component;

class FeaturedProperty extends Component
{
    protected $listeners = ['updateOrder'];
    public $addFeaturedModalOpen = false;
    public $featured_properties;
    public $properties;
    public function mount()
    {
        $this->loadData();
    }
    public function addFeatured($id)
    {
        $property = Property::findOrFail($id);

        if ($property->featured()->exists()) {

            $property->featured()->delete();

            $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'Featured property removed successfully'
            ]);

        } else {

            $property->featured()->create([
                'property_id' => $property->id
            ]);

            $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'Featured property added successfully'
            ]);
        }
        $this->loadData();
    }

    public function delete($id)
    {
        $property = FeaturedProperties::find($id);
        if (!$property) {


            $this->dispatch('toast', [
                'type' => 'error',
                'message' => 'Featured property not found'
            ]);

        } else {



            $property->delete();

            $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'Featured property removed successfully'
            ]);
        }
        $this->loadData();
    }
    public function render()
    {
 

        return view('livewire.admin.properties.featured-property')->layout('layouts.admin.admin');
    }
    public function loadData()
    {
        $this->featured_properties = FeaturedProperties::with('property')->orderBy('sort_order')->get();
        $this->properties = Property::all();
    }
      public function updateOrder($order)
    {
        // dd($data);
        foreach ($order as $item) {

            FeaturedProperties::where('id', $item['id'])
                ->update([
                    'sort_order' => $item['position']
                ]);
        }

        $this->dispatch('toast', [
            'type' => 'success',
            'message' => 'Featured property order updated successfully'
        ]);
        
    }
}

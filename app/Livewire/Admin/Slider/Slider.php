<?php

namespace App\Livewire\Admin\Slider;

use App\Models\Slider as ModelsSlider;
use Livewire\Component;

class Slider extends Component
{
    protected $listeners = ['updateOrder'];

    public function render()
    {
        $sliders = ModelsSlider::where('status', 1)
            ->orderBy('sort_order')
            ->get();
        return view('livewire.admin.slider.slider', compact('sliders'))->layout('layouts.admin.admin');
    }
    public function delete($id)
    {
        $slider = ModelsSlider::find($id);
        if ($slider) {
            $slider->delete();
            $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'Slide deleted successfully'
            ]);
        }
    }
    public function updateOrder($order)
    {
        // dd($data);
        foreach ($order as $item) {

            ModelsSlider::where('id', $item['id'])
                ->update([
                    'sort_order' => $item['position']
                ]);
        }

        $this->dispatch('toast', [
            'type' => 'success',
            'message' => 'Slide order updated successfully'
        ]);
        
    }
}

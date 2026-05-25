<?php

namespace App\Livewire\Admin\Slider;

use App\Models\Slider as ModelsSlider;
use Livewire\Component;

class Slider extends Component
{
    protected $listeners = ['updateOrder'];

    public function render()
    {
        $sliders = ModelsSlider::orderBy('sort_order')->get();
        return view('livewire.admin.slider.slider', compact('sliders'))->layout('layouts.admin.admin');
    }
    public function toggleStatus($id)
    {
        $slider = ModelsSlider::find($id);
        if ($slider) {
            $slider->status = !$slider->status;
            $slider->save();
            $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'Status updated to ' . ($slider->status ? 'Active' : 'Inactive'),
            ]);
        }
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

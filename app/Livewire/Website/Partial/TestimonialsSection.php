<?php

namespace App\Livewire\Website\Partial;

use App\Models\Testimonial;
use Livewire\Component;

class TestimonialsSection extends Component
{
    public function render()
    {
        $testimonials = Testimonial::where('status', 1)->orderBy('sort_order')->get();
        return view('livewire.website.partial.testimonials-section', compact('testimonials'));
    }
}

<?php

namespace App\Livewire\Website\Projects;

use App\Models\Inquiry;
use App\Models\Property;
use Livewire\Component;

class ProjectDetails extends Component
{
    public $slug;

    public $name;
    public $phone;
    public $email;
    public $subject;
    public $message;

    public $source_page;
    public $property_id;
    public $property;
    public function mount($slug)
    {
        $this->slug = $slug;
        // dd($this->slug);
        $property = Property::where('slug', $this->slug)->first();
        if (!$property) {
            abort(404);
        }
        $this->source_page = 'project_details';
        track_visit('property', $property->id, $this->slug);
    }

    protected function rules()
    {
        return [
            'name' => 'required|min:2',
            'phone' => 'required|min:6',
            'email' => 'nullable|email',
            'message' => 'nullable|min:5',
        ];
    }
    public function submit()
    {
        $this->validate();

        Inquiry::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
            'source_page' => $this->source_page,
            'source_url' => request()->fullUrl(),
            'property_id' => $this->property_id,
        ]);

        $this->reset([
            'name',
            'phone',
            'email',
            'subject',
            'message'
        ]);

        $this->dispatch('notify', [
            'title' => 'Success',
            'icon' => 'success',
            'message' => 'Your message has been sent successfully.'
        ]);
    }
    public function render()
    {

        $property = Property::where('slug', $this->slug)->first();
        if (!$property) {
            abort(404);
        }
        $this->property = $property;
        if ($property) {
            $this->property_id = $property->id;
            $this->subject = $property->title . ' Property Inquiry';
        }
        // dd(json_decode($property->hero_image_id));
        return view('livewire.website.projects.project-details', compact('property'))->layout('layouts.website.website');
    }
}

<?php

namespace App\Livewire\Website\Inquiry;

use Livewire\Component;
use App\Models\Inquiry;

class Form extends Component
{
    public $name;
    public $phone;
    public $email;
    public $subject;
    public $message;

    public $source_page;
    public $property_id;

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
            'name','phone','email','subject','message'
        ]);

        session()->flash('success','Your message has been sent.');
    }


    public function render()
    {
        return view('livewire.website.inquiry.form');
    }
}

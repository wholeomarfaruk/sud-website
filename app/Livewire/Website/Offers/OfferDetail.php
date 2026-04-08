<?php

namespace App\Livewire\Website\Offers;

use App\Models\Inquiry;
use Livewire\Component;

class OfferDetail extends Component
{
    public $name;
    public $phone;
    public $email;
    public $subject;
    public $message;

    public $source_page;
    public $offer_id;
    public $offer;
    public function mount($id){
        $this->offer = \App\Models\Offer::find($id);
        if(!$this->offer){
            abort(404);
        }
        $this->source_page = 'project_details';
        $this->offer_id = $id;
        $this->subject = $this->offer->title . ' Offer Inquiry';
        track_visit('offers', $id, $id);


    }
    public function render()
    {
        return view('livewire.website.offers.offer-detail')->layout('layouts.website.website');
    }
        protected function rules()
    {
        return [
            'name' => 'required|min:2',
            'phone' => 'required|min:6',
            'email' => 'nullable|email',
            'message' => 'nullable|min:5',
            'subject' => 'nullable|min:5',
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
            'offer_id' => $this->offer_id,
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
}

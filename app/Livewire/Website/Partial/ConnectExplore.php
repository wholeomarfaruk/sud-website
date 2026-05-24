<?php

namespace App\Livewire\Website\Partial;

use App\Models\Inquiry;
use Livewire\Component;

class ConnectExplore extends Component
{
    public string $name    = '';
    public string $phone   = '';
    public string $email   = '';
    public string $message = '';
    public bool   $submitted = false;

    protected function rules(): array
    {
        return [
            'name'    => 'required|min:2',
            'phone'   => 'required|min:6',
            'email'   => 'nullable|email',
            'message' => 'nullable|min:5',
        ];
    }

    protected $messages = [
        'name.required'  => 'Please enter your name.',
        'name.min'       => 'Name must be at least 2 characters.',
        'phone.required' => 'Please enter your phone number.',
        'phone.min'      => 'Phone number seems too short.',
        'email.email'    => 'Please enter a valid email address.',
        'message.min'    => 'Message must be at least 5 characters.',
    ];

    public function submit(): void
    {
        $this->validate();

        Inquiry::create([
            'name'        => $this->name,
            'phone'       => $this->phone,
            'email'       => $this->email ?: null,
            'message'     => $this->message ?: null,
            'source_page' => 'home-connect',
            'source_url'  => request()->fullUrl(),
        ]);

        $this->reset('name', 'phone', 'email', 'message');
        $this->submitted = true;
    }

    public function resetForm(): void
    {
        $this->submitted = false;
    }

    public function render()
    {
        return view('livewire.website.partial.connect-explore');
    }
}

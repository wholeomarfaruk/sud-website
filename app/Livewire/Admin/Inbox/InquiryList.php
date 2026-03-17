<?php

namespace App\Livewire\Admin\Inbox;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Inquiry;

class InquiryList extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $modalOpen = false;
    public $selectedInquiry;

    protected $queryString = ['search', 'status'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function markAsRead($id)
    {
        $inquiry = Inquiry::find($id);
        if ($inquiry) {
            $inquiry->update(['status' => 'read']);
        }
    }

    public function delete($id)
    {
        Inquiry::find($id)?->delete();
    }

    public function viewInquiry($id)
    {
        $this->selectedInquiry = Inquiry::find($id);
        $this->modalOpen = true;

        if ($this->selectedInquiry->status === 'new') {
            $this->selectedInquiry->update(['status' => 'read']);
        }
    }

    public function render()
    {
        $inquiries = Inquiry::query()
            ->when($this->search, fn($q) => $q->where(function($q){
                $q->where('name','like','%'.$this->search.'%')
                  ->orWhere('phone','like','%'.$this->search.'%')
                  ->orWhere('email','like','%'.$this->search.'%');
            }))
            ->when($this->status, fn($q) => $q->where('status', $this->status))
            ->latest()
            ->paginate(15);

        return view('livewire.admin.inbox.inquiry-list', compact('inquiries'))->layout('layouts.admin.admin');
    }
}

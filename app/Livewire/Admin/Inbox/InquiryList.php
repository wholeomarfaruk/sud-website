<?php

namespace App\Livewire\Admin\Inbox;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Inquiry;
use App\Exports\InquiryExport;
use Maatwebsite\Excel\Facades\Excel;

class InquiryList extends Component
{
    use WithPagination;

    public string $search   = '';
    public string $status   = '';
    public string $source   = '';
    public string $dateFrom = '';
    public string $dateTo   = '';

    public bool  $modalOpen      = false;
    public $selectedInquiry      = null;

    protected $queryString = ['search', 'status', 'source', 'dateFrom', 'dateTo'];

    public function updatingSearch():  void { $this->resetPage(); }
    public function updatingStatus():  void { $this->resetPage(); }
    public function updatingSource():  void { $this->resetPage(); }
    public function updatingDateFrom():void { $this->resetPage(); }
    public function updatingDateTo():  void { $this->resetPage(); }

    public function resetFilters(): void
    {
        $this->reset('search', 'status', 'source', 'dateFrom', 'dateTo');
        $this->resetPage();
    }

    public function markAsRead(int $id): void
    {
        Inquiry::find($id)?->update(['status' => 'read']);
    }

    public function delete(int $id): void
    {
        Inquiry::find($id)?->delete();
    }

    public function viewInquiry(int $id): void
    {
        $this->selectedInquiry = Inquiry::find($id);
        $this->modalOpen = true;

        if ($this->selectedInquiry && $this->selectedInquiry->status === 'new') {
            $this->selectedInquiry->update(['status' => 'read']);
        }
    }

    public function exportExcel()
    {
        $filename = 'inquiries-' . now()->format('Y-m-d-His') . '.xlsx';

        return Excel::download(
            new InquiryExport($this->search, $this->status, $this->source, $this->dateFrom, $this->dateTo),
            $filename
        );
    }

    public function render()
    {
        $inquiries = Inquiry::query()
            ->when($this->search, fn($q) => $q->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('phone', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%');
            }))
            ->when($this->status,   fn($q) => $q->where('status', $this->status))
            ->when($this->source,   fn($q) => $q->where('source_page', $this->source))
            ->when($this->dateFrom, fn($q) => $q->whereDate('created_at', '>=', $this->dateFrom))
            ->when($this->dateTo,   fn($q) => $q->whereDate('created_at', '<=', $this->dateTo))
            ->latest()
            ->paginate(15);

        $sources = Inquiry::query()->distinct()->orderBy('source_page')->pluck('source_page')->filter()->values();

        return view('livewire.admin.inbox.inquiry-list', compact('inquiries', 'sources'))
            ->layout('layouts.admin.admin');
    }
}

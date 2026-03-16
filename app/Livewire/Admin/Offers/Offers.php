<?php

namespace App\Livewire\Admin\Offers;

use App\Models\Offer;
use Livewire\Component;
use Livewire\WithPagination;

class Offers extends Component
{
    use WithPagination;
    public $search = ''; // optional: for search/filter
    public $status = null;
    protected $paginationTheme = 'tailwind'; // 'bootstrap' also works

      public function updatingSearch()
    {
        $this->resetPage(); // reset page on search update
    }

    public function render()
    {
        $offers = Offer::query()
            ->when($this->search, function ($query) {
            $query->where('title', 'like', '%' . $this->search . '%');
        })
        ->when($this->status, function ($query) {
            $status='';
            if($this->status=='active'){
                $status=1;
            }else{
                $status=0;
            }
            $query->where('status', $status);
        })
        ->orderBy('updated_at')->paginate(10);
        return view('livewire.admin.offers.offers', compact('offers'))->layout('layouts.admin.admin');
    }
    public function delete($id)
    {
        $Offer = Offer::find($id);
        if ($Offer) {
            $Offer->delete();
            $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'Offer deleted successfully'
            ]);
        }
    }

}

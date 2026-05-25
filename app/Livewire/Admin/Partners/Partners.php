<?php

namespace App\Livewire\Admin\Partners;

use App\Models\TrustedPartner;
use Illuminate\Http\Request;
use Livewire\Component;

class Partners extends Component
{
    public $modalOpen = false;
    public $id, $name, $link, $image_id, $status = 1, $sort_order;
    public $editMode = false;
    protected $listeners = ['mediaSelected', 'updateOrder'];

    public function mount(Request $request) {}

    public function render()
    {
        $partners = TrustedPartner::orderBy('sort_order')->get();
        return view('livewire.admin.partners.partners', compact('partners'))->layout('layouts.admin.admin');
    }

    public function toggleStatus($id)
    {
        $partner = TrustedPartner::find($id);
        if ($partner) {
            $partner->status = !$partner->status;
            $partner->save();
            $this->dispatch('toast', [
                'type'    => 'success',
                'message' => 'Status updated to ' . ($partner->status ? 'Active' : 'Inactive'),
            ]);
        }
    }

    public function delete($id)
    {
        $partner = TrustedPartner::find($id);
        if (!$partner) {
            $this->dispatch('toast', [
                'type'    => 'error',
                'message' => 'Partner not found',
            ]);
        } else {
            $partner->delete();
            $this->dispatch('toast', [
                'type'    => 'success',
                'message' => 'Partner deleted successfully',
            ]);
        }
    }

    public function mediaSelected($field, $id)
    {
        if (is_array($id)) {
            $this->$field = array_unique(array_merge($this->$field ?? [], $id));
        } else {
            $this->$field = $id;
        }
    }

    public function removeMedia($field, $id = null)
    {
        if ($id !== null && is_array($this->$field)) {
            if (array_key_exists($id, $this->$field)) {
                unset($this->{$field}[$id]);
            } else {
                $this->{$field} = array_values(array_filter(
                    $this->{$field},
                    fn($item) => is_array($item) ? ($item['id'] ?? null) != $id : $item != $id
                ));
            }
        } else {
            $this->$field = null;
        }
    }

    public function save()
    {
        if ($this->editMode) {
            $partner = TrustedPartner::find($this->id);
            if ($partner) {
                $partner->name     = $this->name;
                $partner->link     = $this->link;
                $partner->status   = $this->status;
                $partner->image_id = $this->image_id;
                $partner->save();
            }
            $this->reset('name', 'link', 'status', 'image_id');
            $this->editMode  = false;
            $this->modalOpen = false;
            $this->dispatch('toast', [
                'type'    => 'success',
                'message' => 'Partner updated successfully',
            ]);
            return;
        }

        $partner           = new TrustedPartner();
        $partner->name     = $this->name;
        $partner->link     = $this->link;
        $partner->status   = $this->status;
        $partner->image_id = $this->image_id;
        $partner->save();
        $this->modalOpen = false;
        $this->reset('name', 'link', 'status', 'image_id');
        $this->dispatch('toast', [
            'type'    => 'success',
            'message' => 'Partner added successfully',
        ]);
    }

    public function updateOrder($order)
    {
        foreach ($order as $item) {
            TrustedPartner::where('id', $item['id'])
                ->update(['sort_order' => $item['position']]);
        }
        $this->dispatch('toast', [
            'type'    => 'success',
            'message' => 'Partners order updated successfully',
        ]);
    }

    public function edit($id)
    {
        $partner = TrustedPartner::find($id);
        if ($partner) {
            $this->id       = $partner->id;
            $this->name     = $partner->name;
            $this->link     = $partner->link;
            $this->status   = $partner->status;
            $this->image_id = $partner->image_id;
            $this->editMode = true;
            $this->modalOpen = true;
        }
    }
}

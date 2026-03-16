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
    public function mount(Request $request)
    {


    }
    public function render()
    {
        $partners = TrustedPartner::orderBy('sort_order')->get();
        return view('livewire.admin.partners.partners', compact('partners'))->layout('layouts.admin.admin');
    }
    public function mediaSelected($field, $id)
    {
        // dd($field);
        if (is_array($id)) {
            $this->$field = array_unique(array_merge($this->$field ?? [], $id));
        } else {
            $this->$field = $id;
        }
        // $this->{$field} = array_merge($this->{$field} ?? [], (array)$id);

    }
    public function delete($id)
    {
        $pertner = TrustedPartner::find($id);
        if (!$pertner) {


            $this->dispatch('toast', [
                'type' => 'error',
                'message' => 'pertner not found'
            ]);

        } else {



            $pertner->delete();

            $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'pertner deleted item successfully'
            ]);
        }
    }
    public function removeMedia($field, $id = null)
    {

        if ($id && is_array($this->$field)) {
            // remove specific file from multiple selection

            if (isset($this->{$field}[$id])) {
                unset($this->{$field}[$id]);
            } else {
                $this->{$field} = array_filter(
                    $this->{$field},
                    fn($item) => ($item['id'] ?? null) != $id
                );
            }

        } else {
            // single file
            $this->$field = null;
        }

    }
    public function save()
    {
        if ($this->editMode) {
            $partner = TrustedPartner::find($this->id);
            $partner->name = $this->name;
            $partner->link = $this->link;
            $partner->status = $this->status;
            $partner->image_id = $this->image_id;
            $partner->save();
            $this->reset('name', 'link', 'status', 'image_id');
            $this->editMode = false;
            $this->modalOpen = false;
            
            $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'Partner updated successfully'
            ]);
            return;
        } else {


            $partner = new TrustedPartner();
            $partner->name = $this->name;
            $partner->link = $this->link;
            $partner->status = $this->status;
            $partner->image_id = $this->image_id;
            $partner->save();
            $this->reset('name', 'link', 'status', 'image_id');
            $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'Partner added successfully'
            ]);
        }
    }
    public function updateOrder($order)
    {
        // dd($data);
        foreach ($order as $item) {

            TrustedPartner::where('id', $item['id'])
                ->update([
                    'sort_order' => $item['position']
                ]);
        }

        $this->dispatch('toast', [
            'type' => 'success',
            'message' => 'Partners order updated successfully'
        ]);

    }
    public function edit($id)
    {
        $partner = TrustedPartner::find($id);
        if ($partner) {
            $this->id = $partner->id;
            $this->name = $partner->name;
            $this->link = $partner->link;
            $this->status = $partner->status;
            $this->image_id = $partner->image_id;
            $this->editMode = true;
            $this->modalOpen = true;
        }
    }
}

<?php

namespace App\Livewire\Admin\Members;

use App\Models\Members as ModelsMembers;
use Illuminate\Http\Request;
use Livewire\Component;

class Members extends Component
{


    public $modalOpen = false;
    public $id, $name, $designation, $image, $status = 1, $sort_order;
    public $editMode = false;
    protected $listeners = ['mediaSelected', 'updateOrder'];
    public function mount(Request $request)
    {


    }
    public function render()
    {
        $members = ModelsMembers::orderBy('order')->get();
        return view('livewire.admin.members.members', compact('members'))->layout('layouts.admin.admin');
    }

    public function delete($id)
    {
        $member = ModelsMembers::find($id);
        if (!$member) {


            $this->dispatch('toast', [
                'type' => 'error',
                'message' => 'member not found'
            ]);

        } else {



            $member->delete();

            $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'pertner deleted item successfully'
            ]);
        }
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
            $partner = ModelsMembers::find($this->id);
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


            $partner = new ModelsMembers();
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

            ModelsMembers::where('id', $item['id'])
                ->update([
                    'order' => $item['position']
                ]);
        }

        $this->dispatch('toast', [
            'type' => 'success',
            'message' => 'Member order updated successfully'
        ]);

    }
    public function edit($id)
    {
        $partner = ModelsMembers::find($id);
        if ($partner) {
            $this->id = $partner->id;
            $this->name = $partner->name;
            $this->designation = $partner->designation;
            $this->status = $partner->status;
            $this->image = $partner->image;
            $this->editMode = true;
            $this->modalOpen = true;
        }
    }
}

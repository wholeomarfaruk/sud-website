<?php

namespace App\Livewire\Admin\Members;

use App\Models\Members as ModelsMembers;
use Illuminate\Http\Request;
use Livewire\Component;

class Members extends Component
{


    public $modalOpen = false;
    public $id, $name, $designation, $description, $image, $status = 1;
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
        if ($id !== null && is_array($this->$field)) {
            if (array_key_exists($id, $this->$field)) {
                unset($this->{$field}[$id]);
            } else {
                $this->{$field} = array_values(array_filter(
                    $this->{$field},
                    fn($item) => is_array($item)
                        ? ($item['id'] ?? null) != $id
                        : $item != $id
                ));
            }
        } else {
            $this->$field = null;
        }
    }
    public function save()
    {
        if ($this->editMode) {
            $partner = ModelsMembers::find($this->id);
            $partner->name = $this->name;
            $partner->designation = $this->designation;
            $partner->description = $this->description;
            $partner->status = $this->status;
            $partner->image = $this->image;
            $partner->save();
            $this->reset('name', 'designation', 'description', 'status', 'image');
            $this->editMode = false;
            $this->modalOpen = false;

            $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'Member updated successfully'
            ]);
            return;
        } else {
            $partner = new ModelsMembers();
            $partner->name = $this->name;
            $partner->designation = $this->designation;
            $partner->description = $this->description;
            $partner->status = $this->status;
            $partner->image = $this->image;
            $partner->save();
            $this->modalOpen = false;
            $this->reset('name', 'designation', 'description', 'status', 'image');
            $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'Member added successfully'
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
            $this->description = $partner->description;
            $this->status = $partner->status;
            $this->image = $partner->image;
            $this->editMode = true;
            $this->modalOpen = true;
        }
    }
}

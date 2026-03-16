<?php

namespace App\Livewire\Admin\Slider;

use App\Models\Slider;
use Livewire\Component;
use Illuminate\Http\Request;

class CreateSlide extends Component
{
    public $is_edit = false;
    public $id;
    public $fileinput = [];
    protected $listeners = ['mediaSelected'];
    public $title, $sub_title, $description, $link, $status = false, $sort_order = 0, $image_id = [];
    public function mount(Request $request, $edit = null){

        if($request->has('edit')){
            $edit = $request->edit;
            $slider = Slider::find($edit);
            $this->id = $slider->id;
            $this->title = $slider->title;
            $this->sub_title = $slider->sub_title;
            $this->description = $slider->description;
            $this->link = $slider->link;
            $this->status = $slider->status;
            $this->sort_order = $slider->sort_order;
            $this->image_id = $slider->image_id;
            $this->is_edit = true;
        }else{
            return redirect()->back()->with('toast', [
                'type' => 'error',
                'message' => 'Invalid request'
            ]);
        }
    }
     public function mediaSelected($field, $id)
    {
        // dd($field);
        if (is_array($id)) {
            $this->$field = array_unique(array_merge($this->$field ?? [], $id));
        }else{
            $this->$field = $id;
        }
        // $this->{$field} = array_merge($this->{$field} ?? [], (array)$id);
    }
    public function render()
    {
        return view('livewire.admin.slider.create-slide')->layout('layouts.admin.admin');
    }

    public function removeMedia($field, $id = null)
    {
        if ($id && is_array($this->$field)) {
            // remove specific file from multiple selection
            $this->{$field} = array_filter($this->{$field}, fn($i) => $i != $id);
        } else {
            // single file
            $this->$field = null;
        }
    }
    public function save(){
        $this->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'required',
            'link' => 'required',
            'status' => 'required',
            'sort_order' => 'required',
            'image_id' => 'required',
        ]);
        $slider = Slider::updateOrCreate(
            ['id' =>$this->id],
            [
                'title' => $this->title,
                'sub_title' => $this->sub_title,
                'description' => $this->description,
                'link' => $this->link,
                'status' => $this->status,
                'sort_order' => $this->sort_order,
                'image_id' => $this->image_id
            ]
            );
        if($this->is_edit){
           $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'Slide Updated successfully'
            ]);
        }else{
                    $this->reset();
            $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'Slide created successfully'
            ]);
       }

    }
}

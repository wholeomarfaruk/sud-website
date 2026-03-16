<?php

namespace App\Livewire\Admin\Offers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Livewire\Component;

class CreateUpdate extends Component
{
    public $editMode = false;
    public $id, $title, $description, $featured_image, $status, $is_featured = 0, $meta_title, $meta_description, $meta_image;
    protected $listeners = ['mediaSelected'];
    public $offer;
    public function mount(Request $request)
    {
        if ($request->has('edit')) {
            $id = (int) $request->edit;

            $this->offer = Offer::find($id);
            if ($this->offer) {
                $this->editMode = true;
                $this->id = $this->offer->id;
                $this->title = $this->offer->title;
                $this->description = $this->offer->description;
                $this->featured_image = $this->offer->featured_image;
                $this->status = $this->offer->status;
                $this->is_featured = $this->offer->is_featured;
                $this->meta_title = $this->offer->meta_title;
                $this->meta_description = $this->offer->meta_description;
                $this->meta_image = $this->offer->meta_image;
            }
        }
    }
    public function render()
    {
        return view('livewire.admin.offers.create-update')->layout('layouts.admin.admin');
    }
    public function save(){
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        if($this->editMode){
            $this->offer->update([
                'title' => $this->title,
                'description' => $this->description,
                'status' => $this->status,
                'is_featured' => $this->is_featured,
                'meta_title' => $this->meta_title,
                'meta_description' => $this->meta_description,
                'meta_image' => $this->meta_image,
                'featured_image' => $this->featured_image
            ]);
            $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'Offer Updated successfully'
            ]);
        }else{
            $this->offer = Offer::create([
                'title' => $this->title,
                'description' => $this->description,
                'status' => $this->status,
                'is_featured' => $this->is_featured,
                'meta_title' => $this->meta_title,
                'meta_description' => $this->meta_description,
                'meta_image' => $this->meta_image,
                'featured_image' => $this->featured_image
            ]);
            $this->reset('title', 'description', 'status', 'is_featured', 'meta_title', 'meta_description', 'meta_image');
            $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'Offer Created successfully'
            ]);
        }

    }
    public function removeMedia($field, $id = null)
    {

        if ($id && is_array($this->$field)) {

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
}

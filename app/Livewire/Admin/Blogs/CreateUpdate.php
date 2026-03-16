<?php

namespace App\Livewire\Admin\Blogs;

use App\Models\Blog;
use Illuminate\Http\Request;
use Livewire\Component;

class CreateUpdate extends Component
{
    public $editMode = false;
    public $id, $title, $description, $featured_image, $status, $is_featured = 0, $meta_title, $meta_description, $meta_image;
    protected $listeners = ['mediaSelected'];
    public $blog;
    public function mount(Request $request)
    {
        if ($request->has('edit')) {
            $id = (int) $request->edit;

            $this->blog = Blog::find($id);
            if ($this->blog) {
                $this->editMode = true;
                $this->id = $this->blog->id;
                $this->title = $this->blog->title;
                $this->description = $this->blog->description;
                $this->featured_image = $this->blog->featured_image;
                $this->status = $this->blog->status;
                $this->is_featured = $this->blog->is_featured;
                $this->meta_title = $this->blog->meta_title;
                $this->meta_description = $this->blog->meta_description;
                $this->meta_image = $this->blog->meta_image;
            }
        }
    }
    public function render()
    {
        return view('livewire.admin.blogs.create-update')->layout('layouts.admin.admin');
    }
        public function save(){
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        if($this->editMode){
            $this->blog->update([
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
                'message' => 'blog Updated successfully'
            ]);
        }else{
            $this->blog = Blog::create([
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
                'message' => 'blog Created successfully'
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

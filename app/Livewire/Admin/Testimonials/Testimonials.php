<?php

namespace App\Livewire\Admin\Testimonials;

use App\Models\Testimonial;
use Livewire\Component;

class Testimonials extends Component
{
    public $modalOpen = false;
    public $editMode = false;
    public $id, $author_name, $designation, $content, $image_id, $video_id, $status = 1, $sort_order = 0;

    protected $listeners = ['mediaSelected', 'updateOrder'];

    public function render()
    {
        $testimonials = Testimonial::orderBy('sort_order')->get();
        return view('livewire.admin.testimonials.testimonials', compact('testimonials'))
            ->layout('layouts.admin.admin');
    }

    public function toggleStatus($id)
    {
        $testimonial = Testimonial::find($id);
        if ($testimonial) {
            $testimonial->status = !$testimonial->status;
            $testimonial->save();
            $this->dispatch('toast', [
                'type'    => 'success',
                'message' => 'Status updated to ' . ($testimonial->status ? 'Active' : 'Inactive'),
            ]);
        }
    }

    public function delete($id)
    {
        $testimonial = Testimonial::find($id);
        if (!$testimonial) {
            $this->dispatch('toast', ['type' => 'error', 'message' => 'Testimonial not found']);
        } else {
            $testimonial->delete();
            $this->dispatch('toast', ['type' => 'success', 'message' => 'Testimonial deleted successfully']);
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
            $this->{$field} = array_values(array_filter(
                $this->{$field},
                fn($item) => is_array($item) ? ($item['id'] ?? null) != $id : $item != $id
            ));
        } else {
            $this->$field = null;
        }
    }

    public function save()
    {
        $this->validate([
            'author_name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'content'     => 'required|string',
            'image_id'    => 'nullable',
            'status'      => 'boolean',
            'sort_order'  => 'integer|min:0',
        ]);

        if ($this->editMode) {
            $testimonial = Testimonial::find($this->id);
            if ($testimonial) {
                $testimonial->author_name  = $this->author_name;
                $testimonial->designation  = $this->designation;
                $testimonial->content      = $this->content;
                $testimonial->image_id     = $this->image_id;
                $testimonial->video_id     = $this->video_id;
                $testimonial->status       = $this->status;
                $testimonial->sort_order   = $this->sort_order;
                $testimonial->save();
            }
            $this->reset('id', 'author_name', 'designation', 'content', 'image_id', 'video_id');
            $this->status     = 1;
            $this->sort_order = 0;
            $this->editMode   = false;
            $this->modalOpen  = false;
            $this->dispatch('toast', ['type' => 'success', 'message' => 'Testimonial updated successfully']);
            return;
        }

        Testimonial::create([
            'author_name' => $this->author_name,
            'designation' => $this->designation,
            'content'     => $this->content,
            'image_id'    => $this->image_id,
            'video_id'    => $this->video_id,
            'status'      => $this->status,
            'sort_order'  => $this->sort_order,
        ]);

        $this->reset('author_name', 'designation', 'content', 'image_id', 'video_id');
        $this->status     = 1;
        $this->sort_order = 0;
        $this->modalOpen  = false;
        $this->dispatch('toast', ['type' => 'success', 'message' => 'Testimonial added successfully']);
    }

    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        if ($testimonial) {
            $this->id          = $testimonial->id;
            $this->author_name = $testimonial->author_name;
            $this->designation = $testimonial->designation;
            $this->content     = $testimonial->content;
            $this->image_id    = $testimonial->image_id;
            $this->video_id    = $testimonial->video_id;
            $this->status      = $testimonial->status;
            $this->sort_order  = $testimonial->sort_order;
            $this->editMode    = true;
            $this->modalOpen   = true;
        }
    }

    public function updateOrder($order)
    {
        foreach ($order as $item) {
            Testimonial::where('id', $item['id'])->update(['sort_order' => $item['position']]);
        }
        $this->dispatch('toast', ['type' => 'success', 'message' => 'Order updated successfully']);
    }
}

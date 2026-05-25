<?php

namespace App\Livewire\Admin\Videos;

use App\Models\Videos as ModelsVideos;
use Livewire\Component;

class Videos extends Component
{
    public $addVideoModalOpen = false;
    public $editMode = false;
    public $editId;
    public $video_title, $video_sort_order, $video_duration, $video_thumbnail, $video_id;

    protected $listeners = ['mediaSelected', 'updateOrder'];

    public function render()
    {
        $videos = ModelsVideos::orderBy('sort_order')->get();
        return view('livewire.admin.videos.videos', compact('videos'))->layout('layouts.admin.admin');
    }

    public function edit($id)
    {
        $video = ModelsVideos::find($id);
        if (!$video) {
            $this->dispatch('toast', ['type' => 'error', 'message' => 'Video not found']);
            return;
        }

        $this->editId           = $video->id;
        $this->video_title      = $video->title;
        $this->video_duration   = $video->duration;
        $this->video_sort_order = $video->sort_order;
        $this->video_thumbnail  = $video->thumbnail;
        $this->video_id         = $video->video_id;
        $this->editMode         = true;
        $this->addVideoModalOpen = true;
    }

    public function save()
    {
        $this->validate([
            'video_title'    => 'required',
            'video_duration' => 'required|integer|min:0',
            'video_id'       => 'required',
            'video_thumbnail' => 'required',
        ]);

        if ($this->editMode) {
            $video = ModelsVideos::find($this->editId);
            if ($video) {
                $video->title      = $this->video_title;
                $video->duration   = $this->video_duration;
                $video->sort_order = $this->video_sort_order ?? 0;
                $video->thumbnail  = $this->video_thumbnail;
                $video->video_id   = $this->video_id;
                $video->save();
            }
            $this->resetForm();
            $this->dispatch('toast', ['type' => 'success', 'message' => 'Video updated successfully']);
            return;
        }

        $duplicate = ModelsVideos::where('video_id', $this->video_id)->first();
        if ($duplicate) {
            $this->addError('video_id', 'This video file has already been added');
            return;
        }

        ModelsVideos::create([
            'title'      => $this->video_title,
            'duration'   => $this->video_duration,
            'sort_order' => $this->video_sort_order ?? 0,
            'video_id'   => $this->video_id,
            'thumbnail'  => $this->video_thumbnail,
        ]);

        $this->resetForm();
        $this->dispatch('toast', ['type' => 'success', 'message' => 'Video added successfully']);
    }

    public function delete($id)
    {
        $video = ModelsVideos::find($id);
        if (!$video) {
            $this->dispatch('toast', ['type' => 'error', 'message' => 'Video not found']);
        } else {
            $video->delete();
            $this->dispatch('toast', ['type' => 'success', 'message' => 'Video removed successfully']);
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

    public function updateOrder($order)
    {
        foreach ($order as $item) {
            ModelsVideos::where('id', $item['id'])->update(['sort_order' => $item['position']]);
        }
        $this->dispatch('toast', ['type' => 'success', 'message' => 'Videos order updated successfully']);
    }

    private function resetForm()
    {
        $this->reset('editId', 'video_title', 'video_duration', 'video_sort_order', 'video_thumbnail', 'video_id');
        $this->editMode         = false;
        $this->addVideoModalOpen = false;
    }
}

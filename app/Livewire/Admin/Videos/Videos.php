<?php

namespace App\Livewire\Admin\Videos;

use App\Models\Videos as ModelsVideos;
use Livewire\Component;

class Videos extends Component
{
        public $addVideoModalOpen = false;
    public $video_title, $video_sort_order, $video_duration, $video_thumbnail, $video_id;
    protected $listeners = ['mediaSelected', 'updateOrder'];

    public function render()
    {
        $videos = ModelsVideos::orderBy('sort_order')->get();
        return view('livewire.admin.videos.videos', compact('videos'))->layout('layouts.admin.admin');
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
      public function updateOrder($order)
    {
        // dd($data);
        foreach ($order as $item) {

            ModelsVideos::where('id', $item['id'])
                ->update([
                    'sort_order' => $item['position']
                ]);
        }

        $this->dispatch('toast', [
            'type' => 'success',
            'message' => 'Videos order updated successfully'
        ]);

    }
    public function addVideo()
    {
        $model = ModelsVideos::where('video_id', $this->video_id)->first();
        if($model){
            return $this->addError('video_id', 'Video already added');
        }
    $this->validate([
        'video_title' => 'required',
        'video_duration' => 'required',
        'video_id' => 'required',
        'video_thumbnail' => 'required',
    ]);

        $video = ModelsVideos::create([
            'title' => $this->video_title,
            'duration' => $this->video_duration,
            'video_id' => $this->video_id,
            'thumbnail' => $this->video_thumbnail
        ]);

        $this->addVideoModalOpen = false;

        $this->reset(['video_id', 'video_thumbnail', 'video_title', 'video_sort_order', 'video_duration']);
        // dd($this->videos);
        $this->dispatch('toast', [
            'type' => 'success',
            'message' => 'Video added successfully'
        ]);
    }
     public function delete($id)
    {
        $video = ModelsVideos::find($id);
        if (!$video) {


            $this->dispatch('toast', [
                'type' => 'error',
                'message' => 'Video not found'
            ]);

        } else {



            $video->delete();

            $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'Video removed successfully'
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
}

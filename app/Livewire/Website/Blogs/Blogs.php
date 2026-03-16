<?php

namespace App\Livewire\Website\Blogs;

use Livewire\Component;
use Livewire\WithPagination;

class Blogs extends Component
{
    use WithPagination;
    public $search='';
    public function updatingSearch()
    {
        $this->resetPage(); // reset page on search update
    }
    public function render()
    {
        $blogs = \App\Models\Blog::query()
            ->where('status', 1)
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
         ->paginate(50); // use paginate
        return view('livewire.website.blogs.blogs', compact('blogs'))->layout('layouts.website.website');
    }
}

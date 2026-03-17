<?php

namespace App\Livewire\Website\Blogs;

use Livewire\Component;

class BlogDetails extends Component
{
    public $blog;
    public function mount($id){
        $this->blog = \App\Models\Blog::find($id);
        if(!$this->blog){
            abort(404);
        }
        track_visit('blog', $id, $id);
    }
    public function render()
    {
        return view('livewire.website.blogs.blog-details')->layout('layouts.website.website');
    }
}

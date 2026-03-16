<?php

namespace App\Livewire\Admin\Blogs;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class Blogs extends Component
{
    use WithPagination;
    public $search = ''; // optional: for search/filter
    public $status = null;
    protected $paginationTheme = 'tailwind'; // 'bootstrap' also works

      public function updatingSearch()
    {
        $this->resetPage(); // reset page on search update
    }

    public function render()
    {
         $blogs = Blog::query()
            ->when($this->search, function ($query) {
            $query->where('title', 'like', '%' . $this->search . '%');
        })
        ->when($this->status, function ($query) {
            $status='';
            if($this->status=='active'){
                $status=1;
            }else{
                $status=0;
            }
            $query->where('status', $status);
        })
        ->orderBy('updated_at')->paginate(10);
        return view('livewire.admin.blogs.blogs', compact('blogs'))->layout('layouts.admin.admin');
    }
     public function delete($id)
    {
        $Blog = Blog::find($id);
        if ($Blog) {
            $Blog->delete();
            $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'Blog deleted successfully'
            ]);
        }
    }
}

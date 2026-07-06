<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::query()
            ->where('status', 1)
            ->when($request->query('search'), function ($query, $search) {
                $query->where('title', 'like', '%'.$search.'%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate((int) $request->query('per_page', 20));

        $blogs->getCollection()->transform(fn (Blog $blog) => $this->transform($blog));

        return response()->json($blogs);
    }

    public function show(int $id)
    {
        $blog = Blog::where('status', 1)->find($id);

        if (! $blog) {
            abort(404);
        }

        return response()->json($this->transform($blog));
    }

    protected function transform(Blog $blog): array
    {
        return [
            'id' => $blog->id,
            'title' => $blog->title,
            'description' => $blog->description,
            'featured_image' => file_path($blog->featured_image),
            'is_featured' => (bool) $blog->is_featured,
            'meta_title' => $blog->meta_title,
            'meta_description' => $blog->meta_description,
            'meta_image' => $blog->meta_image,
            'created_at' => $blog->created_at,
            'post_link' => route('blogs.details', $blog->id),
        ];
    }
}

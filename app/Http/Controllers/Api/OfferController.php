<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index(Request $request)
    {
        $offers = Offer::query()
            ->where('status', 1)
            ->when($request->query('search'), function ($query, $search) {
                $query->where('title', 'like', '%'.$search.'%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate((int) $request->query('per_page', 20));

        $offers->getCollection()->transform(fn (Offer $offer) => $this->transform($offer));

        return response()->json($offers);
    }

    public function show(int $id)
    {
        $offer = Offer::where('status', 1)->find($id);

        if (! $offer) {
            abort(404);
        }

        return response()->json($this->transform($offer));
    }

    protected function transform(Offer $offer): array
    {
        return [
            'id' => $offer->id,
            'title' => $offer->title,
            'description' => $offer->description,
            'featured_image' => file_path($offer->featured_image),
            'is_featured' => (bool) $offer->is_featured,
            'meta_title' => $offer->meta_title,
            'meta_description' => $offer->meta_description,
            'meta_image' => $offer->meta_image,
            'created_at' => $offer->created_at,
            'post_link' => route('offers.details', $offer->id),
        ];
    }
}

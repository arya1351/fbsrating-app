<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\RatingImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RatingsController extends Controller
{
    /**
     * Simpan rating dan gambar-gambarnya.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'product' => 'required|string|max:255',
            'rating_desc' => 'required|string|max:1000',
            'stars' => 'required|integer|min:1|max:5',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan rating ke tabel ratings
        $rating = Rating::create([
            'product' => $request->product,
            'rating_desc' => $request->rating_desc,
            'stars' => $request->stars,
            'user_id' => Auth::id(),
        ]);

        // Simpan gambar-gambar ke tabel rating_images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image) {
                    $path = $image->store('rating_images', 'public');

                    RatingImage::create([
                        'rating_id' => $rating->id,
                        'img_path' => $path,
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Rating berhasil dikirim!');
    }
}

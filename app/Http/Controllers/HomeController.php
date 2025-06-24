<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $ratings = Rating::latest()->get(); // ambil semua rating terbaru
        $starCounts = Rating::selectRaw('stars, COUNT(*) as total')->groupBy('stars')->orderBy('stars')->pluck('total', 'stars');

        return view('home', [
            'ratings' => $ratings,
            'starCounts' => $starCounts,
        ]);
    }
}

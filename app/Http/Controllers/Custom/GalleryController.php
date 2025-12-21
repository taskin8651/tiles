<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddGallery;
use App\Models\GalleryCategory;

class GalleryController extends Controller
{
    public function index()
    {
        // Sabhi categories aur galleries fetch karo
        $categories = GalleryCategory::pluck('title', 'id'); // id => title
        $galleries  = AddGallery::with('category')->get();

        return view('custom.gallery', compact('categories', 'galleries'));
    }
}

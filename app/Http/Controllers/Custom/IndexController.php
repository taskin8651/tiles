<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ProductCategory;
use App\Models\AddGallery;
use App\Models\Contactdetail;
use App\Models\Product;
use App\Models\Testimoni;
use App\Models\Blog;
use App\Models\Brand;

class IndexController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();

        // Categories (agar kahin aur use ho rahi ho)
        $categories = ProductCategory::with('media')->latest()->get();

        // Gallery images + media
        $galleries = AddGallery::with('media')->latest()->get();

         $contactInfo = Contactdetail::first(); // get contact info from config file
          $products = Product::all(); // get all products
            $testimonials = Testimoni::all(); // get all testimonials

               // latest brands with logo media
        $brands = Brand::with('media')->latest()->get();


             // latest 3 blogs with media
        $blogs = Blog::with('media')
            ->latest()
            ->take(3)
            ->get();

              // size filter (URL se ?size=600x600)
        $size = request('size');

        $productsQuery = Product::with(['media', 'category']);

        if ($size) {
            $productsQuery->where('size', $size);
        }

        $products = $productsQuery->latest()->get();

        // size list (enum se)
        $sizes = collect(Product::SIZE_SELECT)
            ->map(fn($label, $key) => (object)[
                'key' => $key,
                'label' => $label
            ]);


        return view('custom.index', compact(
            'services',
            'categories',
            'galleries',
            'contactInfo',
            'products',
            'testimonials',
            'blogs',
            'brands',
            'sizes'

        ));
    }
}

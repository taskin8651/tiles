<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductsTag;

class ProductController extends Controller
{
     // Product listing
 public function index(Request $request)
{
    $query = Product::with(['category', 'tag']);

    // 🔍 SEARCH
    if ($request->filled('search')) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    // 📂 CATEGORY FILTER
    if ($request->filled('category')) {
        $query->where('category_id', $request->category);
    }

    // 🏷 TAG FILTER
    if ($request->filled('tag')) {
        $query->where('tag_id', $request->tag);
    }

    // 📏 SIZE FILTER
    if ($request->filled('size')) {
        $query->where('size', $request->size);
    }

    $products = $query->latest()->paginate(9)->withQueryString();

    // sidebar data
    $categories = ProductCategory::all();
    $tags       = ProductsTag::all();
    $sizes      = Product::select('size')->distinct()->whereNotNull('size')->get();

    return view('custom.product', compact('products', 'categories', 'tags', 'sizes'));
}

    // Product details
    public function show(Product $product)
    {
        return view('custom.product-detail', compact('product'));
    }
}

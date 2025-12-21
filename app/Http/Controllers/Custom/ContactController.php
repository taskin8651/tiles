<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\Product;
use App\Models\Contactdetail;


class ContactController extends Controller
{
    // Show the contact form
   public function showForm(Request $request)
{
    $contactInfo = Contactdetail::first(); // get contact info from config file
    $products = Product::all(); // get all products
    return view('custom.contact', compact('products', 'contactInfo'));
}
    // Handle form submission
   public function submitForm(Request $request)
{
    $request->validate([
        'name'        => 'required|string|max:255',
        'email'       => 'required|email|max:255',
        'number'      => 'nullable|string|max:20',
        'full_address'=> 'nullable|string|max:255',
        'product_id'  => 'nullable|exists:products,id',
        'message'     => 'required|string',
    ]);

    Enquiry::create($request->all());

    return back()->with('success', 'Your enquiry has been submitted successfully!');
}
}

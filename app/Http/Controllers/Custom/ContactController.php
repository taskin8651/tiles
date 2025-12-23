<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\Product;
use App\Models\Contactdetail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Show the contact form
     */
    public function showForm()
    {
        $contactInfo = Contactdetail::first();
        $products = Product::all();

        return view('custom.contact', compact('products', 'contactInfo'));
    }

    /**
     * Handle form submission
     */
   public function submitForm(Request $request)
{
    // ✅ Validate input
    $validated = $request->validate([
        'name'         => 'required|string|max:255',
        'email'        => 'required|email|max:255',
        'number'       => 'nullable|string|max:20',
        'full_address' => 'nullable|string|max:255',
        'product_id'   => 'nullable|exists:products,id',
        'message'      => 'required|string',
    ]);

    // ✅ Store enquiry
    $enquiry = Enquiry::create($validated);

    // ✅ Product details (safe)
    $product = $enquiry->product;

    if ($product) {
        $productDetails = "
Product Details
----------------
Title: {$product->title}
Brand: " . ($product->brand_name ?? 'N/A') . "
Category: " . ($product->category->name ?? 'N/A') . "
Size: " . (\App\Models\Product::SIZE_SELECT[$product->size] ?? $product->size ?? 'N/A') . "
Finish: " . (\App\Models\Product::FINISH_SELECT[$product->finish] ?? 'N/A') . "
Thickness: " . ($product->thickness ?? 'N/A') . " mm
Usage Area: " . (\App\Models\Product::USAGE_AREA_SELECT[$product->usage_area] ?? 'N/A') . "
Price: " . ($product->price ?? 'N/A') . "
Short Description: " . ($product->short_description ?? 'N/A');
    } else {
        $productDetails = "Product: N/A";
    }

    // ✅ Safe customer details
    $number  = $enquiry->number ?: 'N/A';
    $address = $enquiry->full_address ?: 'N/A';

    // ✅ Email body
    $emailBody = "New Product Enquiry Received

Customer Details
----------------
Name: {$enquiry->name}
Email: {$enquiry->email}
Phone: {$number}
Address: {$address}

{$productDetails}

Customer Message
----------------
{$enquiry->message}
";

    // ✅ Send email
    Mail::raw($emailBody, function ($message) use ($enquiry) {
        $message->to(config('mail.from.address'))
                ->subject('New Product Enquiry')
                ->from(
                    config('mail.from.address'),
                    config('mail.from.name')
                )
                ->replyTo($enquiry->email, $enquiry->name);
    });

    return back()->with('success', 'Your enquiry has been submitted successfully!');
}

}

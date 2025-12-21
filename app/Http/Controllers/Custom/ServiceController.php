<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    // Services Listing
    public function index()
    {
        $services = Service::latest()->get();
        return view('custom.service', compact('services'));
    }

    // Service Detail Page
    public function show(Service $service)
{
    $services = \App\Models\Service::latest()->get(); // sidebar list

    return view('custom.service-detail', compact('service', 'services'));
}

}

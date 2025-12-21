<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Testimoni;
use App\Models\Brand;

class AboutController extends Controller
{
    public function index()
    {
        // Sabhi team members fetch karo
        $teams = Team::all();

        // Sabhi testimonials fetch karo
        $testimonials = Testimoni::all();
        // dd($testimonials);

              $brands = Brand::with('media')->latest()->get();
        return view('custom.about', compact('teams', 'testimonials', 'brands'));
    }
}

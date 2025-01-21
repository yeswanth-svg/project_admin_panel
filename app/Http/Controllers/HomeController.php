<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderCarousel;
use App\Models\Services;

class HomeController extends Controller
{
    //
    public function index()
    {
        $services = Services::all();

        $carousels = HeaderCarousel::all(); // Retrieve all carousel data
        return view('welcome', compact('carousels','services'));
    }
    public function about()
    {
        return view('about_us');
    }

    public function products()
    {
        // Fetch all services from the database
        $services = Services::all();

        // Pass services data to the view
        return view('products', compact('services'));
    }

    public function contact()
    {
        return view('contact');
    }
}

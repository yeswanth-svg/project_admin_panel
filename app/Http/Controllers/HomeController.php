<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderCarousel;
use App\Models\Services;
use App\Models\TeamMembers;

use App\Models\AboutUs;

class HomeController extends Controller
{
    //
    public function index()
    {
        $services = Services::all();
        $carousels = HeaderCarousel::all(); 
        $aboutUs = AboutUs::first();// Retrieve all carousel data
        $teams = TeamMembers::all(); // Retrieve all team members
        return view('welcome', compact('carousels','services','aboutUs','teams'));
    }
    public function about()
    {
        $aboutUs = AboutUs::first();
        return view('about_us', compact('aboutUs'));
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

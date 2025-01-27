<?php

namespace App\Http\Controllers;

use App\Models\ContentBlocks;
use App\Models\Testimonials;
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
        $testimonials = Testimonials::all(); // Retrieve all
        $emailContent = ContentBlocks::where('key', 'email-us')->first(); // Retrieve email content
        $phoneContent = ContentBlocks::where('key', 'phone-number')->first();
        return view('welcome', compact('carousels', 'services', 'aboutUs', 'teams', 'testimonials', 'emailContent', 'phoneContent'));
    }
    public function about()
    {
        $aboutUs = AboutUs::first();
        $teams = TeamMembers::all();
        $emailContent = ContentBlocks::where('key', 'email-us')->first(); // Retrieve email content
        $phoneContent = ContentBlocks::where('key', 'phone-number')->first();
        return view('about_us', compact('aboutUs', 'teams', 'emailContent','phoneContent'));
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
        $emailContent = ContentBlocks::where('key', 'email-us')->first(); // Retrieve email content
        $phoneContent = ContentBlocks::where('key', 'phone-number')->first();
        $officeContent = ContentBlocks::where('key', 'office-address')->first();

        return view('contact', compact('emailContent','phoneContent','officeContent'));
    }
    public function show($id)
    {
        $service = Services::findOrFail($id); // Use Services model here
        return view('product_detail', compact('service'));
    }
}

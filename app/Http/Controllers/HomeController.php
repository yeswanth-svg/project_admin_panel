<?php

namespace App\Http\Controllers;

use App\Models\ContentBlocks;
use App\Models\Testimonials;
use Illuminate\Http\Request;
use App\Models\HeaderCarousel;
use App\Models\Services;
use App\Models\TeamMembers;
use Illuminate\Support\Facades\Mail;

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
        $officeContent = ContentBlocks::where('key', 'office-address')->first();
        return view('welcome', compact('carousels', 'services', 'aboutUs', 'teams', 'testimonials', 'emailContent', 'phoneContent', 'officeContent'));
    }
    public function about()
    {
        $aboutUs = AboutUs::first();
        $teams = TeamMembers::all();
        $emailContent = ContentBlocks::where('key', 'email-us')->first(); // Retrieve email content
        $phoneContent = ContentBlocks::where('key', 'phone-number')->first();
        $officeContent = ContentBlocks::where('key', 'office-address')->first();
        return view('about_us', compact('aboutUs', 'teams', 'emailContent', 'phoneContent', 'officeContent'));
    }

    public function products()
    {
        // Fetch all services from the database
        $services = Services::all();
        $officeContent = ContentBlocks::where('key', 'office-address')->first();
        $emailContent = ContentBlocks::where('key', 'email-us')->first(); // Retrieve email content
        $phoneContent = ContentBlocks::where('key', 'phone-number')->first();

        // Pass services data to the view
        return view('products', compact('services', 'officeContent', 'phoneContent', 'emailContent'));
    }

    public function contact()
    {
        $emailContent = ContentBlocks::where('key', 'email-us')->first(); // Retrieve email content
        $phoneContent = ContentBlocks::where('key', 'phone-number')->first();
        $officeContent = ContentBlocks::where('key', 'office-address')->first();
        $officeAddress = urlencode($officeContent->content); // Encode the address for the URL
        // dd($officeAddress);
        $mapEmbedUrl = "https://www.google.com/maps?q={$officeAddress}&output=embed";


        return view('contact', compact('emailContent', 'phoneContent', 'officeContent', 'mapEmbedUrl'));
    }
    public function show($id)
    {
        $service = Services::findOrFail($id); // Use Services model here
        $officeContent = ContentBlocks::where('key', 'office-address')->first();
        $emailContent = ContentBlocks::where('key', 'email-us')->first(); // Retrieve email content
        $phoneContent = ContentBlocks::where('key', 'phone-number')->first();
        return view('product_detail', compact('service', 'officeContent', 'phoneContent', 'emailContent'));
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'user_message' => $request->input('message'), // Renamed key
        ];

        try {
            Mail::send('emails.contact', $data, function ($message) use ($data) {
                $message->to('support@skilljo.tech')
                    ->subject($data['subject'])
                    ->replyTo($data['email'], $data['name'])
                    ->from(config('mail.from.address'), config('mail.from.name'));
            });

            return back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }



}

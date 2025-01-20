<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('about_us');
    }

    public function products()
    {
        return view('products');
    }

    public function contact()
    {
        return view('contact');
    }
}

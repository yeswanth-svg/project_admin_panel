<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeaderCarousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    //
    public function index()
    {
        $carousels = HeaderCarousel::all();
        return view('admin.carousel.index', compact('carousels'));
    }

    public function create()
    {
        return view('admin.carousel.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                "image_path" => "required|file|mimes:mp4",
            ]
        );
        $carousel = new HeaderCarousel();
        $carousel->title = 'Head Section';

        if ($request->hasFile("image_path")) {
            $video = $request->file("image_path");
            $filename = time() . "." . $video->getClientOriginalExtension();

            $directory = public_path('header_section');
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }
            $video->move($directory, $filename);
            $carousel->image_path = $filename;
        }

        $carousel->save();
        return redirect()->route('admin.carousel.index')->with('success', 'Video add successfully!');

    }

    public function destroy(string $id)
    {
        //
        $carousel = HeaderCarousel::find($id);

        if ($carousel->image_path && file_exists(public_path('header_section/' . $carousel->image_path))) {
            unlink(public_path('header_section/' . $carousel->image_path));
        }

        $carousel->delete();
        return redirect()->route('admin.carousel.index')->with('success', 'Video deleted successfully!');
    }
}

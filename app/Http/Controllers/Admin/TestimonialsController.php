<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonials;
use Illuminate\Http\Request;
use PHPUnit\Event\Code\Test;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $testimonials = Testimonials::all();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'client_name' => 'required',
                'profession' => 'required',
                'testimonial' => 'required',
                'image_path' => 'nullable|mimes:jpg,jpeg,png'
            ]
        );

        $testimonial = new Testimonials();

        $testimonial->client_name = $request->client_name;
        $testimonial->profession = $request->profession;
        $testimonial->testimonial = $request->testimonial;

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $filename = time() . '' . $image->getClientOriginalExtension();

            $directroy = public_path('testimonial_images');

            if (!file_exists($directroy)) {
                mkdir($directroy, 0777, true);
            }

            $image->move($directroy, $filename);
            $testimonial->image_path = $filename;

        }
        $testimonial->save();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial Added Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $testimonial = Testimonials::findOrFail($id);

        return response()->json($testimonial);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $testimonial = Testimonials::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $test = Testimonials::findOrFail($id);
        $test->client_name = $request->client_name;
        $test->profession = $request->profession;
        $test->testimonial = $request->testimonial;

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Delete the old image if it exists
            if ($test->image_path && file_exists('testimonial_images/' . $test->image_path)) {
                unlink('testimonial_images/' . $test->image_path);
            }

            $image->move('testimonial_images/', $filename);
            $test->image_path = $filename;
        }
        $test->update();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $testimonial = Testimonials::findOrFail($id);

        if ($testimonial->image_path && file_exists('testimonial_images/' . $testimonial->image_path)) {
            unlink('testimonial_images/' . $testimonial->image_path);
        }
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial Deleted Successfully');
    }
}

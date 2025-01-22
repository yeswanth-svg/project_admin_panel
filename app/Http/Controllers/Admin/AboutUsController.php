<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    //
    public function edit(string $id)
    {
        $aboutUs = AboutUs::find($id);
        return view("admin.about_us.edit", compact("aboutUs"));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image_path' => 'required',
        ]);

        $about = AboutUs::findOrFail($id);
        $about->title = $request->title;
        $about->content = $request->content;

        $directory = public_path('about_images');
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }

        // Handle the main image upload
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $filename = time() . '_main.' . $image->getClientOriginalExtension();

            // Delete the old image if it exists
            if ($about->image_path && file_exists($directory . '/' . $about->image_path)) {
                unlink($directory . '/' . $about->image_path);
            }

            $image->move($directory, $filename);
            $about->image_path = $filename;
        }

        // Handle the additional image upload
        if ($request->hasFile('additional_image_path')) {
            $additional_image = $request->file('additional_image_path');
            $additional_filename = time() . '_additional.' . $additional_image->getClientOriginalExtension();

            // Delete the old additional image if it exists
            if ($about->additional_image_path && file_exists($directory . '/' . $about->additional_image_path)) {
                unlink($directory . '/' . $about->additional_image_path);
            }

            $additional_image->move($directory, $additional_filename);
            $about->additional_image_path = $additional_filename;
        }

        $about->save();

        return redirect()->route("admin.about_us.edit", $id)->with("success", "About Us updated successfully!");
    }


}

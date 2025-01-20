<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function index()
    {
        $products = Services::all();
        return view("admin.products.index", compact("products"));

    }

    public function create()
    {
        return view("admin.products.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image_path' => 'required|mimes:png,jpg,jpeg',
        ]);

        $products = new Services();
        $products->title = $request->title;
        $products->description = $request->description;

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $filename = time() . "." . $image->getClientOriginalExtension();

            $directory = public_path('products_images');
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            $image->move($directory, $filename);
            $products->image_path = $filename;
        }
        $products->save();
        return redirect()->route('admin.products.index')->with('success', 'Product Added Successfully!');

    }

    public function show(string $id)
    {
        //
        $product = Services::findOrFail($id); // Ensure to load the related dish type

        return response()->json($product);
    }

    public function edit(string $id)
    {
        $product = Services::findOrFail($id);
        return view('admin.products.edit', compact('product'));

    }

    public function update(Request $request, string $id)
    {

        $product = Services::findOrFail($id);
        $product->title = $request->title;
        $product->description = $request->description;

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Delete the old image if it exists
            if ($product->image_path && file_exists('products_images' . '/' . $product->image_path)) {
                unlink('products_images' . '/' . $product->image_path);
            }

            $image->move('products_images', $filename);
            $product->image_path = $filename;
        }
        $product->save();
        return redirect()->route('admin.products.index')->with('success', 'Product Updated Successfully');

    }

    public function destroy(string $id)
    {
        $product = Services::findOrFail($id);
        if ($product->image_path && !file_exists('products_images/' . $product->image_path)) {
            unlink('products_images/' . $product->image_path);
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product Deleted Successfully!');
    }
}

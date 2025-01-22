<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContentBlocks;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $contents = ContentBlocks::all();
        return view('admin.content.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.content.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        $content = new ContentBlocks();
        $key = Str::slug($request->title);
        $content->key = $key;
        $content->title = $request->title;
        $content->content = $request->content;

        $content->save();

        return redirect()->route('admin.content.index')->with('success', 'Content Added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $content = ContentBlocks::findOrFail($id);
        return response()->json($content);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $content = ContentBlocks::findOrFail($id);
        return view('admin.content.edit', compact('content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        $content = ContentBlocks::findOrFail($id);
        $key = Str::slug($request->title);
        $content->key = $key;
        $content->title = $request->title;
        $content->content = $request->content;

        $content->save();

        return redirect()->route('admin.content.index')->with('success', 'Content updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $content = ContentBlocks::find($id);
        $content->delete();

        return redirect()->route('admin.content.index')->with('success', 'Content deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMembers;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = TeamMembers::all();
        return view("admin.team.index", compact("teams"));
    }

    public function create()
    {
        return view("admin.team.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'bio' => 'required',
            'image_path' => 'required|mimes:png,jpg,jpeg',
        ]);

        $team = new TeamMembers();
        $team->name = $request->name;
        $team->position = $request->position;
        $team->bio = $request->bio;

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $filename = time() . "." . $image->getClientOriginalExtension();

            $directory = public_path('team_member_images');
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            $image->move($directory, $filename);
            $team->image_path = $filename;
        }
        $team->save();

        return redirect()->route('admin.team.index')->with('success', 'Team Member Added Successfully!');
    }

    public function show(string $id)
    {
        $team = TeamMembers::findOrFail($id);
        return response()->json($team);
    }

    public function edit(string $id)
    {
        $team = TeamMembers::findOrFail($id);
        return view('admin.team.edit', compact('team'));
    }

    public function update(Request $request, string $id)
    {
        $team = TeamMembers::findOrFail($id);
        $team->name = $request->name;
        $team->position = $request->position;
        $team->bio = $request->bio;

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Delete the old image if it exists
            if ($team->image_path && file_exists('team_member_images/' . $team->image_path)) {
                unlink('team_team_member_imagesimages/' . $team->image_path);
            }

            $image->move('team_member_images/', $filename);
            $team->image_path = $filename;
        }
        $team->save();

        return redirect()->route('admin.team.index')->with('success', 'Team Member Updated Successfully');
    }

    public function destroy(string $id)
    {
        $team = TeamMembers::findOrFail($id);
        if ($team->image_path && file_exists('team_member_images/' . $team->image_path)) {
            unlink('team_member_images/' . $team->image_path);
        }
        $team->delete();
        return redirect()->route('admin.team.index')->with('success', 'Team Member Deleted Successfully!');
    }
}

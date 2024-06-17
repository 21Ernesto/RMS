<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageTeamController extends Controller
{
    public function edit(Team $team)
    {
        return view('admin.image.team', compact('team'));
    }

    public function update(Request $request, $team)
    {
        $team = Team::findOrFail($team);

        $validatedData = $request->validate([
            'image' => 'required|image',
        ]);

        if ($request->hasFile('image')) {
            if (File::exists(public_path($team->image))) {
                File::delete(public_path($team->image));
            }
            $imageName = 'team_'.time().'.'.$request->image->extension();
            $request->file('image')->move(public_path('images/team'), $imageName);
            $validatedData['image'] = 'images/team/'.$imageName;
        }

        $team->update($validatedData);

        return redirect()->route('teams.index');
    }
}

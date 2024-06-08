<?php

namespace App\Livewire;

use App\Models\Team as ModelsTeam;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Team extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $search;

    public $name;
    public $position;
    public $image;
    public $editId;


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $teams = ModelsTeam::where('name', 'like', '%' . $this->search . '%')->paginate(8);
        return view('livewire.team', compact('teams'))->layout('layouts.admin');
    }

    public function saveCategory()
    {
        
        $rules = [
            'name' => 'required|string',
            'position' => 'required|string',
            'image' => 'nullable',
        ];
        
        $validatedData = $this->validate($rules);

        if ($this->image) {
            $this->deleteOldImage();
            $imageName = time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/images/teams', $imageName);
            $validatedData['image'] = 'storage/images/teams/' . $imageName;
            $this->image->delete();
        } elseif ($this->editId) {
            unset($validatedData['image']);
        }

        if ($this->editId) {
            $team = ModelsTeam::find($this->editId);
            $team->update($validatedData);
        } else {
            ModelsTeam::create($validatedData);
        }

        $this->resetForm();
    }

    private function deleteOldImage()
    {
        $team = ModelsTeam::find($this->editId);
        if ($team && $team->image) {
            Storage::delete($team->image);
        }
    }

    public function edit($id)
    {
        $team = ModelsTeam::findOrFail($id);
        $this->editId = $team->id;
        $this->name = $team->name;
        $this->position = $team->position;
        $this->image = null;
    }

    public function delete($id)
    {
        $package = ModelsTeam::findOrFail($id);

        if ($package->image) {
            $frontPagePath = public_path($package->image);
            if (file_exists($frontPagePath)) {
                unlink($frontPagePath);
            }
        }

        $package->delete();
    }

    public function cancelEdit()
    {
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->name = '';
        $this->position = '';
        $this->image = '';
    }
}

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
        ];
        
        $validatedData = $this->validate($rules);

        if ($this->editId) {
            $team = ModelsTeam::find($this->editId);
            $team->update($validatedData);
        } else {
            ModelsTeam::create($validatedData);
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $team = ModelsTeam::findOrFail($id);
        $this->editId = $team->id;
        $this->name = $team->name;
        $this->position = $team->position;
    }

    public function delete($id)
    {
        $package = ModelsTeam::findOrFail($id);

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
    }
}

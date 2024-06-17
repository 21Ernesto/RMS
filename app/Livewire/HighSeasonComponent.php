<?php

namespace App\Livewire;

use App\Models\HighSeason;
use Livewire\Component;
use Livewire\WithPagination;

class HighSeasonComponent extends Component
{
    use WithPagination;

    public $search;

    public $trip;

    public $highSeason;

    public $description = '';

    public $trip_id;

    public $editId;

    public function render()
    {
        $this->trip_id = $this->trip->id;
        $highSeasons = HighSeason::where('trip_id', $this->trip->id)->get();

        return view('livewire.high-season-component', compact('highSeasons'));
    }

    public function save()
    {
        $rules = [
            'description' => 'required|string',
            'trip_id' => 'required|exists:trips,id',
        ];

        $validatedData = $this->validate($rules);

        if ($this->editId) {
            $highSeason = HighSeason::find($this->editId);
            $highSeason->update($validatedData);
        } else {
            HighSeason::create($validatedData);
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $this->editId = $id;
        $highSeason = HighSeason::findOrFail($id);
        $this->description = $highSeason->description;
    }

    public function cancelEdit()
    {
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->description = '';
        $this->editId = null;
    }

    public function delete($id)
    {
        $highSeason = HighSeason::findOrFail($id);
        $this->resetForm();
        $highSeason->delete();
    }
}

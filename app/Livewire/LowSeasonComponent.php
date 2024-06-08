<?php

namespace App\Livewire;

use App\Models\LowSeason;
use Livewire\Component;
use Livewire\WithPagination;

class LowSeasonComponent extends Component
{

    use WithPagination;

    public $search;
    public $trip;
    public $lowSeason;
    public $description = '';
    public $trip_id;
    public $editId;

    public function render()
    {
        $this->trip_id = $this->trip->id;
        $lowSeasons = LowSeason::where('trip_id', $this->trip->id)->paginate(10);
        return view('livewire.low-season-component', compact('lowSeasons'));
    }

    public function save()
    {
        $rules = [
            'description' => 'required|string',
            'trip_id' => 'required|exists:trips,id',
        ];

        $validatedData = $this->validate($rules);

        if ($this->editId) {
            $lowSeason = LowSeason::find($this->editId);
            $lowSeason->update($validatedData);
        } else {
            LowSeason::create($validatedData);
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $this->editId = $id;
        $lowSeason = LowSeason::findOrFail($id);
        $this->description = $lowSeason->description;
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
        $lowSeason = LowSeason::findOrFail($id);
        $this->resetForm();
        $lowSeason->delete();
    }
}

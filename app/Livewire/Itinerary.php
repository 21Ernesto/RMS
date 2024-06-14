<?php

namespace App\Livewire;

use App\Models\Itinerary as ModelsItinerary;
use Livewire\Component;
use Livewire\WithPagination;

class Itinerary extends Component
{
    use WithPagination;

    public $search;
    public $trip;
    public $itinerary;
    public $title = '';
    public $description = '';
    public $trip_id;
    public $editId;


    public function render()
    {
        $this->trip_id = $this->trip->id;
        $itineraries = ModelsItinerary::where('trip_id', $this->trip->id)->get();
        return view('livewire.itinerary', compact('itineraries'));
    }

    public function save()
    {
        $rules = [
            'title' => 'nullable|string',
            'description' => 'required|string',
            'trip_id' => 'required|exists:trips,id',
        ];

        $validatedData = $this->validate($rules);

        if ($this->editId) {
            $itinerary = ModelsItinerary::find($this->editId);
            $itinerary->update($validatedData);
        } else {
            ModelsItinerary::create($validatedData);
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $this->editId = $id;
        $itinerary = ModelsItinerary::findOrFail($id);
        $this->title = $itinerary->title;
        $this->description = $itinerary->description;
    }


    public function cancelEdit()
    {
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->title = '';
        $this->description = '';
        $this->editId = null;
    }

    public function delete($id)
    {
        $itinerary = ModelsItinerary::findOrFail($id);
        $this->resetForm();
        $itinerary->delete();
    }
}

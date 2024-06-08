<?php

namespace App\Livewire;

use App\Models\Recommendation as ModelsRecommendation;
use Livewire\Component;
use Livewire\WithPagination;

class Recommendation extends Component
{

    use WithPagination;

    public $search;
    public $trip;
    public $recommendation;
    public $description = '';
    public $trip_id;
    public $editId;


    public function render()
    {
        $this->trip_id = $this->trip->id;
        $recommendations = ModelsRecommendation::where('trip_id', $this->trip->id)->paginate(10);
        return view('livewire.recommendation', compact('recommendations'));
    }

    public function save()
    {
        $rules = [
            'description' => 'required|string',
            'trip_id' => 'required|exists:trips,id',
        ];

        $validatedData = $this->validate($rules);

        if ($this->editId) {
            $recommendation = ModelsRecommendation::find($this->editId);
            $recommendation->update($validatedData);
        } else {
            ModelsRecommendation::create($validatedData);
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $this->editId = $id;
        $recommendation = ModelsRecommendation::findOrFail($id);
        $this->description = $recommendation->description;
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
        $recommendation = ModelsRecommendation::findOrFail($id);
        $this->resetForm();
        $recommendation->delete();
    }
}

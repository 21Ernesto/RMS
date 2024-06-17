<?php

namespace App\Livewire;

use App\Models\Suggestion as ModelsSuggestion;
use Livewire\Component;
use Livewire\WithPagination;

class Suggestion extends Component
{
    use WithPagination;

    public $search;

    public $trip;

    public $suggestion;

    public $description = '';

    public $trip_id;

    public $editId;

    public function render()
    {
        $this->trip_id = $this->trip->id;
        $suggestions = ModelsSuggestion::where('trip_id', $this->trip->id)->get();

        return view('livewire.suggestion', compact('suggestions'));
    }

    public function save()
    {
        $rules = [
            'description' => 'required|string',
            'trip_id' => 'required|exists:trips,id',
        ];

        $validatedData = $this->validate($rules);

        if ($this->editId) {
            $suggestion = ModelsSuggestion::find($this->editId);
            $suggestion->update($validatedData);
        } else {
            ModelsSuggestion::create($validatedData);
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $this->editId = $id;
        $suggestion = ModelsSuggestion::findOrFail($id);
        $this->description = $suggestion->description;
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
        $suggestion = ModelsSuggestion::findOrFail($id);
        $this->resetForm();
        $suggestion->delete();
    }
}

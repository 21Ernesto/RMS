<?php

namespace App\Livewire;

use App\Models\Note as ModelsNote;
use Livewire\Component;
use Livewire\WithPagination;

class Note extends Component
{
    use WithPagination;

    public $search;

    public $trip;

    public $note;

    public $description = '';

    public $trip_id;

    public $editId;

    public function render()
    {
        $this->trip_id = $this->trip->id;
        $notes = ModelsNote::where('trip_id', $this->trip->id)->get();

        return view('livewire.note', compact('notes'));
    }

    public function save()
    {
        $rules = [
            'description' => 'required|string',
            'trip_id' => 'required|exists:trips,id',
        ];

        $validatedData = $this->validate($rules);

        if ($this->editId) {
            $note = ModelsNote::find($this->editId);
            $note->update($validatedData);
        } else {
            ModelsNote::create($validatedData);
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $this->editId = $id;
        $note = ModelsNote::findOrFail($id);
        $this->description = $note->description;
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
        $note = ModelsNote::findOrFail($id);
        $this->resetForm();
        $note->delete();
    }
}

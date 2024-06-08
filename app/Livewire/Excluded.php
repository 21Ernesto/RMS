<?php

namespace App\Livewire;

use App\Models\Excluded as ModelsExcluded;
use Livewire\Component;
use Livewire\WithPagination;

class Excluded extends Component
{

    use WithPagination;

    public $search;
    public $trip;
    public $excluded;
    public $description = '';
    public $trip_id;
    public $editId;

    public function render()
    {
        $this->trip_id = $this->trip->id;
        $excludeds = ModelsExcluded::where('trip_id', $this->trip->id)->paginate(10);
        return view('livewire.excluded', compact('excludeds'));
    }

    public function save()
    {
        $rules = [
            'description' => 'required|string',
            'trip_id' => 'required|exists:trips,id',
        ];

        $validatedData = $this->validate($rules);

        if ($this->editId) {
            $excluded = ModelsExcluded::find($this->editId);
            $excluded->update($validatedData);
        } else {
            ModelsExcluded::create($validatedData);
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $this->editId = $id;
        $excluded = ModelsExcluded::findOrFail($id);
        $this->description = $excluded->description;
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
        $excluded = ModelsExcluded::findOrFail($id);
        $this->resetForm();
        $excluded->delete();
    }
}

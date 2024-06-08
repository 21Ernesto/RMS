<?php

namespace App\Livewire;

use App\Models\Includes as ModelsIncludes;
use Livewire\Component;
use Livewire\WithPagination;

class Includes extends Component
{

    use WithPagination;

    public $search;
    public $trip;
    public $include;
    public $description = '';
    public $trip_id;
    public $editId;

    public function render()
    {
        $this->trip_id = $this->trip->id;
        $includes = ModelsIncludes::where('trip_id', $this->trip->id)->paginate(10);
        return view('livewire.includes', compact('includes'));
    }

    public function save()
    {
        $rules = [
            'description' => 'required|string',
            'trip_id' => 'required|exists:trips,id',
        ];

        $validatedData = $this->validate($rules);

        if ($this->editId) {
            $include = ModelsIncludes::find($this->editId);
            $include->update($validatedData);
        } else {
            ModelsIncludes::create($validatedData);
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $this->editId = $id;
        $include = ModelsIncludes::findOrFail($id);
        $this->description = $include->description;
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
        $include = ModelsIncludes::findOrFail($id);
        $this->resetForm();
        $include->delete();
    }
}

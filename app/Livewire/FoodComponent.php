<?php

namespace App\Livewire;

use App\Models\Food;
use Livewire\Component;
use Livewire\WithPagination;

class FoodComponent extends Component
{

    use WithPagination;

    public $search;
    public $trip;
    public $food;
    public $description = '';
    public $trip_id;
    public $editId;

    public function render()
    {
        $this->trip_id = $this->trip->id;
        $foods = Food::where('trip_id', $this->trip->id)->get();
        return view('livewire.food-component', compact('foods'));
    }

    public function save()
    {
        $rules = [
            'description' => 'required|string',
            'trip_id' => 'required|exists:trips,id',
        ];

        $validatedData = $this->validate($rules);

        if ($this->editId) {
            $food = Food::find($this->editId);
            $food->update($validatedData);
        } else {
            Food::create($validatedData);
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $this->editId = $id;
        $food = Food::findOrFail($id);
        $this->description = $food->description;
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
        $food = Food::findOrFail($id);
        $this->resetForm();
        $food->delete();
    }
}

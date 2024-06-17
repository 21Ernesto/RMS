<?php

namespace App\Livewire;

use App\Models\Schedule as ModelsSchedule;
use Livewire\Component;
use Livewire\WithPagination;

class Schedule extends Component
{
    use WithPagination;

    public $search;

    public $trip;

    public $schedule;

    public $description = '';

    public $trip_id;

    public $editId;

    public function render()
    {
        $this->trip_id = $this->trip->id;
        $schedules = ModelsSchedule::where('trip_id', $this->trip->id)->get();

        return view('livewire.schedule', compact('schedules'));
    }

    public function save()
    {
        $rules = [
            'description' => 'required|string',
            'trip_id' => 'required|exists:trips,id',
        ];

        $validatedData = $this->validate($rules);

        if ($this->editId) {
            $schedule = ModelsSchedule::find($this->editId);
            $schedule->update($validatedData);
        } else {
            ModelsSchedule::create($validatedData);
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $this->editId = $id;
        $schedule = ModelsSchedule::findOrFail($id);
        $this->description = $schedule->description;
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
        $schedule = ModelsSchedule::findOrFail($id);
        $this->resetForm();
        $schedule->delete();
    }
}

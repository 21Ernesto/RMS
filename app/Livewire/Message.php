<?php

namespace App\Livewire;

use App\Models\Itinerary;
use App\Models\Message as ModelsMessage;
use Livewire\Component;
use Livewire\WithPagination;

class Message extends Component
{

    use WithPagination;

    public $search;
    public $trip;
    public $message;
    public $description = '';
    public $trip_id;
    public $editId;


    public function render()
    {
        $this->trip_id = $this->trip->id;
        $messages = ModelsMessage::where('trip_id', $this->trip->id)->paginate(10);
        return view('livewire.message', compact('messages'));
    }

    public function save()
    {
        $rules = [
            'description' => 'required|string',
            'trip_id' => 'required|exists:trips,id',
        ];

        $validatedData = $this->validate($rules);

        if ($this->editId) {
            $message = ModelsMessage::find($this->editId);
            $message->update($validatedData);
        } else {
            ModelsMessage::create($validatedData);
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $this->editId = $id;
        $message = ModelsMessage::findOrFail($id);
        $this->description = $message->description;
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
        $message = ModelsMessage::findOrFail($id);
        $this->resetForm();
        $message->delete();
    }
}

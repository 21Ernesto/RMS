<?php

namespace App\Livewire;

use App\Models\Season as ModelsSeason;
use Livewire\Component;
use Livewire\WithPagination;

class Season extends Component
{

    use WithPagination;

    public $search;

    public $name;
    public $datestart;
    public $dateend;
    public $percentage;
    public $editId;

    public function render()
    {
        $seasons = ModelsSeason::where('name', 'like', '%' . $this->search . '%')->paginate(8);
        return view('livewire.season', compact('seasons'))->layout('layouts.admin');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255|unique:seasons,name,' . $this->editId,
            'datestart' => 'required|date',
            'dateend' => 'required|date',
            'percentage' => 'required|numeric',
        ]);

        if ($this->editId) {
            $season = ModelsSeason::findOrFail($this->editId);
            $season->update([
                'name' => $this->name,
                'datestart' => $this->datestart,
                'dateend' => $this->dateend,
                'percentage' => $this->percentage,
            ]);
        } else {
            ModelsSeason::create([
                'name' => $this->name,
                'datestart' => $this->datestart,
                'dateend' => $this->dateend,
                'percentage' => $this->percentage,
            ]);
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $season = ModelsSeason::findOrFail($id);
        $this->editId = $id;
        $this->name = $season->name;
        $this->datestart = $season->datestart;
        $this->dateend = $season->dateend; // Corregido aquí
        $this->percentage = $season->percentage; // Corregido aquí
    }


    public function delete($id)
    {
        $season = ModelsSeason::findOrFail($id);
        $season->delete();
    }

    private function resetForm()
    {
        $this->editId = null;
        $this->name = '';
        $this->datestart = '';
        $this->dateend = '';
        $this->percentage = '';
    }

    public function cancelEdit()
    {
        $this->resetForm();
    }
}

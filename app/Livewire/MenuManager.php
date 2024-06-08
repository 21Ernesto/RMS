<?php

namespace App\Livewire;

use App\Models\Menu;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class MenuManager extends Component
{
    use WithPagination;

    public $name;
    public $slug;
    public $status = false; // Iniciar como falso por defecto
    public $editMenuId;

    public function render()
    {
        $menus = Menu::paginate(8);
        return view('livewire.menu-manager', compact('menus'))->layout('layouts.admin');
    }

    public function saveMenu()
    {
        $this->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:menus,slug' . ($this->editMenuId ? ',' . $this->editMenuId : ''),
            'status' => 'nullable|boolean',
        ]);

        if ($this->editMenuId) {
            $this->updateMenu();
        } else {
            $this->createMenu();
        }

        $this->resetForm();
    }

    private function createMenu()
    {
        Menu::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status ?? false,
        ]);
    }

    private function updateMenu()
    {
        $menu = Menu::findOrFail($this->editMenuId);
        $menu->update([
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status ?? false,
        ]);
    }

    public function edit($id)
    {
        $this->editMenuId = $id;
        $menu = Menu::findOrFail($id);
        $this->name = $menu->name;
        $this->slug = $menu->slug;
        $this->status = (bool) $menu->status; // Asegúrate de convertirlo a booleano
    }

    public function delete($id)
    {
        Menu::findOrFail($id)->delete();
    }

    public function cancelEdit()
    {
        $this->resetForm();
    }

    public function updatedName()
    {
        $this->slug = Str::slug($this->name);
    }

    private function resetForm()
    {
        $this->name = '';
        $this->slug = '';
        $this->status = false;
        $this->editMenuId = null;
    }
}

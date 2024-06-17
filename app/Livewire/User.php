<?php

namespace App\Livewire;

use App\Models\User as ModelsUser;
use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;

    public $search;

    public $name;

    public $email;

    public $password;

    public $editId;

    public function render()
    {
        $users = ModelsUser::where('name', 'like', '%'.$this->search.'%')->where('email', 'like', '%'.$this->search.'%')->paginate(8);

        return view('livewire.user', compact('users'))->layout('layouts.admin');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->editId,
            'password' => 'sometimes|nullable|string|min:8',
        ]);

        if ($this->editId) {
            $user = ModelsUser::findOrFail($this->editId);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
        } else {
            ModelsUser::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password),
            ]);
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $user = ModelsUser::findOrFail($id);
        $this->editId = $id;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function delete($id)
    {
        $user = ModelsUser::findOrFail($id);
        $user->delete();
    }

    private function resetForm()
    {
        $this->editId = null;
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public function cancelEdit()
    {
        $this->resetForm();
    }
}

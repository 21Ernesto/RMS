<?php

namespace App\Livewire;

use App\Models\Mail as ModelsMail;
use Livewire\Component;
use Livewire\WithPagination;

class Mail extends Component
{
    use WithPagination;

    public $search;

    public $name;

    public $email;

    public $editId;

    public function render()
    {
        $mails = ModelsMail::where('name', 'like', '%'.$this->search.'%')->where('email', 'like', '%'.$this->search.'%')->paginate(8);

        return view('livewire.mail', compact('mails'))->layout('layouts.admin');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:mails,email,'.$this->editId,
        ]);

        if ($this->editId) {
            $mail = ModelsMail::findOrFail($this->editId);
            $mail->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
        } else {
            ModelsMail::create([
                'name' => $this->name,
                'email' => $this->email,
            ]);
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $mail = ModelsMail::findOrFail($id);
        $this->editId = $id;
        $this->name = $mail->name;
        $this->email = $mail->email;
    }

    public function delete($id)
    {
        $mail = ModelsMail::findOrFail($id);
        $mail->delete();
        $this->resetPage();
    }

    private function resetForm()
    {
        $this->editId = null;
        $this->name = '';
        $this->email = '';
    }

    public function cancelEdit()
    {
        $this->resetForm();
    }
}

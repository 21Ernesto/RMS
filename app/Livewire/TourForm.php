<?php

namespace App\Livewire;

use Livewire\Component;

class TourForm extends Component
{
    public $trip;
    public $quantity;
    public $total = 0;
    public $total_real = 0;

    public function mount($trip)
    {
        $this->trip = $trip;
        $this->calculateTotal();
    }

    public function updatedQuantity()
    {
        if ($this->quantity === '' || $this->quantity < 1) {
            $this->quantity = '';
        }
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        if (!empty($this->quantity) && $this->quantity > 0) {
            $this->total = $this->quantity * $this->trip['price'];
            $this->total_real = $this->quantity * $this->trip['price_real'];
        } else {
            $this->total = 0;
            $this->total_real = 0;
        }
    }


    public function render()
    {
        return view('livewire.tour-form');
    }
}

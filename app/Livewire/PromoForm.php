<?php

namespace App\Livewire;

use App\Models\Season;
use Carbon\Carbon;
use Livewire\Component;

class PromoForm extends Component
{

    public $trip;
    public $hotels;
    public $selectedHotel = null;

    public $adult = 0;
    public $child = 0;

    public $total = 0;
    public $total_real = 0;
    public $date_start;

    public function mount($trip)
    {
        $this->trip = $trip;
        $this->hotels = $trip->promoinns;
        $this->date_start = now()->format('Y-m-d');
        $this->calculateTotal();
    }

    public function render()
    {
        return view('livewire.promo-form', [
            'hotels' => $this->hotels,
        ]);
    }

    public function calculateTotal()
    {
        $hotel = $this->hotels->firstWhere('id', $this->selectedHotel);

        if ($hotel) {
            // Dividir la cantidad de adultos por dos antes de multiplicar por el precio
            $total_adult = ($this->adult > 0) ? ($this->adult / 2) * $hotel->adult_price_client : 0;
            $total_child = ($this->child > 0) ? $this->child * $hotel->child_price_client : 0;

            $this->total = $total_adult + $total_child;

            $total_adult_real = ($this->adult > 0) ? ($this->adult / 2) * $hotel->adult_price_provider : 0;
            $total_child_real = ($this->child > 0) ? $this->child * $hotel->child_price_provider : 0;

            $this->total_real = $total_adult_real+ $total_child_real;

            // Aplicar el porcentaje de la temporada si corresponde
            $this->applySeasonPercentage();
        }
    }


    public function applySeasonPercentage()
    {
        $date = Carbon::parse($this->date_start);
        $season = Season::where('datestart', '<=', $date)
            ->where('dateend', '>=', $date)
            ->first();

        if ($season) {
            $this->total += $this->total * ($season->percentage / 100);
            $this->total_real += $this->total_real * ($season->percentage / 100);
        }
    }

    public function increase($type)
    {
        if ($this->$type >= 0) {
            $this->$type++;
            $this->calculateTotal();
        }
    }

    public function decrease($type)
    {
        if ($this->$type > 0) {
            $this->$type--;
            $this->calculateTotal();
        }
    }

    public function increaseDouble($type)
    {
        if ($this->$type >= 0) {
            $this->$type += 2;
            $this->calculateTotal();
        }
    }

    public function decreaseDouble($type)
    {
        if ($this->$type > 0) {
            $this->$type -= 2;
            $this->calculateTotal();
        }
    }
}

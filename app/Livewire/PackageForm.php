<?php

namespace App\Livewire;

use App\Models\Season;
use Carbon\Carbon;
use Livewire\Component;

class PackageForm extends Component
{
    public $trip;

    public $hotels;

    public $selectedHotel = null;

    public $quantity_simple = 0;

    public $quantity_double = 0;

    public $quantity_triple = 0;

    public $quantity_quadruple = 0;

    public $quantity_children_under_10 = 0;

    public $total = 0;

    public $total_real = 0;

    public $date_start;

    // Nuevas propiedades para determinar la visibilidad
    public $show_simple = true;

    public $show_double = true;

    public $show_triple = true;

    public $show_quadruple = true;

    public $show_children_under_10 = true;

    public function mount($trip)
    {
        $this->trip = $trip;
        $this->hotels = $trip->packageDeliveries;
        $this->date_start = now()->format('Y-m-d');
        $this->calculateTotal();
    }

    public function render()
    {
        return view('livewire.package-form', [
            'hotels' => $this->hotels,
        ]);
    }

    public function calculateTotal()
    {
        $hotel = $this->hotels->firstWhere('id', $this->selectedHotel);

        if ($hotel) {

            $this->show_simple = $hotel->client_simple != 0.00;
            $this->show_double = $hotel->client_double != 0.00;
            $this->show_triple = $hotel->client_triple != 0.00;
            $this->show_quadruple = $hotel->client_quadruple != 0.00;
            $this->show_children_under_10 = $hotel->client_children_under_10 != 0.00;

            $total_simple = ($this->quantity_simple > 0) ? $this->quantity_simple * $hotel->client_simple : 0;
            $total_double = ($this->quantity_double > 0) ? $this->quantity_double * $hotel->client_double * 2 : 0;
            $total_triple = ($this->quantity_triple > 0) ? $this->quantity_triple * $hotel->client_triple * 3 : 0;
            $total_quadruple = ($this->quantity_quadruple > 0) ? $this->quantity_quadruple * $hotel->client_quadruple * 4 : 0;
            $total_children_under_10 = ($this->quantity_children_under_10 > 0) ? $this->quantity_children_under_10 * $hotel->client_children_under_10 : 0;

            $this->total = $total_simple + $total_double + $total_triple + $total_quadruple + $total_children_under_10;

            $total_simple_real = ($this->quantity_simple > 0) ? $this->quantity_simple * $hotel->provider_simple : 0;
            $total_double_real = ($this->quantity_double > 0) ? $this->quantity_double * $hotel->provider_double * 2 : 0;
            $total_triple_real = ($this->quantity_triple > 0) ? $this->quantity_triple * $hotel->provider_triple * 3 : 0;
            $total_quadruple_real = ($this->quantity_quadruple > 0) ? $this->quantity_quadruple * $hotel->provider_quadruple * 4 : 0;
            $total_children_under_10_real = ($this->quantity_children_under_10 > 0) ? $this->quantity_children_under_10 * $hotel->provider_children_under_10 : 0;

            $this->total_real = $total_simple_real + $total_double_real + $total_triple_real + $total_quadruple_real + $total_children_under_10_real;

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
}

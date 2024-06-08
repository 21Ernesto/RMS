<?php

namespace App\Livewire;

use App\Models\SaleDelivery as ModelsSaleDelivery;
use Livewire\Component;
use Livewire\WithPagination;

class SaleDelivery extends Component
{

    use WithPagination;


    public $search;
    public $datestart;
    public $dateend;
    public $type_trips;

    public function mount()
    {
        $this->datestart = date('Y-m-01');
        $this->dateend = date('Y-m-d');

        $this->type_trips = "";
    }

    public function render()
    {
        $saledeliveriesQuery = ModelsSaleDelivery::query();



        if ($this->type_trips !== "") {
            $saledeliveriesQuery->where('type_trips', $this->type_trips);
        } else if ($this->type_trips) {
            $saledeliveriesQuery->where('type_trips', $this->type_trips);
        }


        if ($this->search) {
            $saledeliveriesQuery->where('uuid', 'like', '%' . $this->search . '%');
        }

        if ($this->datestart) {
            $saledeliveriesQuery->whereDate('created_at', '>=', $this->datestart);
        }

        if ($this->dateend) {
            $saledeliveriesQuery->whereDate('created_at', '<=', $this->dateend);
        }

        $saledeliveries = $saledeliveriesQuery->paginate(8);

        $total = 0;
        $total_real = 0;

        // $total += $saledelivery->quantity * $saledelivery->price; //Ganancias
        // $total_real += $saledelivery->quantity * $saledelivery->price_real; //Diferencial
        foreach ($saledeliveries as $saledelivery) {

            $trip = $saledelivery->trip;
            $packageDeliveries = $trip->packageDeliveries;
            // $simple = $saledelivery->quantity_simple * $packageDeliveries->client_simple;

            // $total = $simple;
        }


        return view('livewire.sale-delivery', compact('saledeliveries', 'total', 'total_real'));
    }
}

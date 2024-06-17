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

        $this->type_trips = '';
    }

    public function render()
    {
        $saledeliveriesQuery = ModelsSaleDelivery::query();

        if ($this->type_trips !== '') {
            $saledeliveriesQuery->where('type_trips', $this->type_trips);
        } elseif ($this->type_trips) {
            $saledeliveriesQuery->where('type_trips', $this->type_trips);
        }

        if ($this->search) {
            $saledeliveriesQuery->where('uuid', 'like', '%'.$this->search.'%');
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
        foreach ($saledeliveries as $saledelivery) {
            $total += $saledelivery->total;
            $total_real += $saledelivery->total_real;
        }

        return view('livewire.sale-delivery', compact('saledeliveries', 'total', 'total_real'));
    }
}

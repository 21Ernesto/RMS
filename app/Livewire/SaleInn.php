<?php

namespace App\Livewire;

use App\Models\SaleInn as ModelsSaleInn;
use Livewire\Component;
use Livewire\WithPagination;

class SaleInn extends Component
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
        $saleinnsQuery = ModelsSaleInn::query();

        

        if ($this->type_trips !== "") {
            $saleinnsQuery->where('type_trips', $this->type_trips);
        } else if ($this->type_trips) {
            $saleinnsQuery->where('type_trips', $this->type_trips);
        }


        if ($this->search) {
            $saleinnsQuery->where('uuid', 'like', '%' . $this->search . '%');
        }

        if ($this->datestart) {
            $saleinnsQuery->whereDate('created_at', '>=', $this->datestart);
        }

        if ($this->dateend) {
            $saleinnsQuery->whereDate('created_at', '<=', $this->dateend);
        }

        $saleinns = $saleinnsQuery->paginate(8);

        $total = 0;
        $total_real = 0;
        foreach ($saleinns as $saleinn) {
            $total += $saleinn->quantity * $saleinn->price; //Ganancias
            $total_real += $saleinn->quantity * $saleinn->price_real; //Diferencial
        }


        return view('livewire.sale-inn', compact('saleinns', 'total', 'total_real'));
    }
}

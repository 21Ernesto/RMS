<?php

namespace App\Livewire;

use App\Models\SalePromo as ModelsSalePromo;
use Livewire\Component;
use Livewire\WithPagination;

class SalePromo extends Component
{
    use WithPagination;

    
    public $search;
    public $datestart;
    public $dateend;

    public function mount()
    {
        $this->datestart = date('Y-m-01');
        $this->dateend = date('Y-m-d');

    }

    public function render()
    {
        $saleinnsQuery = ModelsSalePromo::query();


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
            $total += $saleinn->total;
            $total_real += $saleinn->total_real;

        }


        return view('livewire.sale-promo', compact('saleinns', 'total', 'total_real'));
    }
}

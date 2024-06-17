<?php

namespace App\Livewire;

use App\Models\PromoInn as ModelsPromoInn;
use Livewire\Component;
use Livewire\WithPagination;

class PromoInn extends Component
{
    use WithPagination;

    public $search;

    public $trip;

    public $hotel_name;

    public $duration_days_nights;

    public $city;

    public $adult_price_client;

    public $child_price_client;

    public $adult_price_provider;

    public $child_price_provider;

    public $stars;

    public $trip_id;

    public $editId;

    public function render()
    {
        $this->trip_id = $this->trip->id;

        $promoInns = ModelsPromoInn::where('hotel_name', 'like', '%'.$this->search.'%')->where('trip_id', $this->trip->id)->paginate(8);

        return view('livewire.promo-inn', compact('promoInns'));
    }

    public function save()
    {
        $rules = [
            'hotel_name' => 'required|string',
            'duration_days_nights' => 'required|integer',
            'city' => 'required|string',
            'adult_price_client' => 'required|numeric',
            'child_price_client' => 'required|numeric',
            'adult_price_provider' => 'required|numeric',
            'child_price_provider' => 'required|numeric',
            'stars' => 'required|integer',
            'trip_id' => 'required|exists:trips,id',
        ];

        $validatedData = $this->validate($rules);

        if ($this->editId) {
            $promoInn = ModelsPromoInn::find($this->editId);
            $promoInn->update($validatedData);
        } else {
            ModelsPromoInn::create($validatedData);
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $this->editId = $id;
        $promoInn = ModelsPromoInn::findOrFail($id);
        $this->hotel_name = $promoInn->hotel_name;
        $this->duration_days_nights = $promoInn->duration_days_nights;
        $this->city = $promoInn->city;
        $this->adult_price_client = $promoInn->adult_price_client;
        $this->child_price_client = $promoInn->child_price_client;
        $this->adult_price_provider = $promoInn->adult_price_provider;
        $this->child_price_provider = $promoInn->child_price_provider;
        $this->stars = $promoInn->stars;
    }

    public function cancelEdit()
    {
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->hotel_name = '';
        $this->duration_days_nights = '';
        $this->city = '';
        $this->adult_price_client = '';
        $this->child_price_client = '';
        $this->adult_price_provider = '';
        $this->child_price_provider = '';
        $this->stars = '';
        $this->editId = null;
    }

    public function delete($id)
    {
        $promoInn = ModelsPromoInn::findOrFail($id);
        $this->resetForm();
        $promoInn->delete();
    }
}

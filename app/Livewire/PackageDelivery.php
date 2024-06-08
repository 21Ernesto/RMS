<?php

namespace App\Livewire;

use App\Models\PackageDelivery as ModelsPackageDelivery;
use Livewire\Component;
use Livewire\WithPagination;

class PackageDelivery extends Component
{

    use WithPagination;

    public $search;

    public $trip;

    public $hotel_name;
    public $days_nights;
    public $city;

    public $provider_simple;
    public $provider_double;
    public $provider_triple;
    public $provider_quadruple;
    public $provider_children_under_10;
    public $client_simple;
    public $client_double;
    public $client_triple;
    public $client_quadruple;
    public $client_children_under_10;



    public $stars;
    public $trip_id;
    public $editId;

    public function render()
    {
        $this->trip_id = $this->trip->id;

        $packagedeliveries = ModelsPackageDelivery::where('hotel_name', 'like', '%' . $this->search . '%')->where('trip_id', $this->trip->id)->paginate(8);

        return view('livewire.package-delivery', compact('packagedeliveries'));
    }

    public function save()
    {
        $rules = [
            'hotel_name' => 'required|string',
            'days_nights' => 'required|integer',
            'city' => 'required|string',

            'provider_simple' => 'required|numeric',
            'provider_double' => 'required|numeric',
            'provider_triple' => 'required|numeric',
            'provider_quadruple' => 'required|numeric',
            'provider_children_under_10' => 'required|numeric',
            'client_simple' => 'required|numeric',
            'client_double' => 'required|numeric',
            'client_triple' => 'required|numeric',
            'client_quadruple' => 'required|numeric',
            'client_children_under_10' => 'required|numeric',

            'stars' => 'required|integer',
            'trip_id' => 'required|exists:trips,id',
        ];

        $validatedData = $this->validate($rules);

        if ($this->editId) {
            $packagedelivery = ModelsPackageDelivery::find($this->editId);
            $packagedelivery->update($validatedData);
        } else {
            ModelsPackageDelivery::create($validatedData);
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $this->editId = $id;
        $packagedelivery = ModelsPackageDelivery::findOrFail($id);
        $this->hotel_name = $packagedelivery->hotel_name;
        $this->days_nights = $packagedelivery->days_nights;
        $this->city = $packagedelivery->city;
        
        $this->provider_simple = $packagedelivery->provider_simple;
        $this->provider_double = $packagedelivery->provider_double;
        $this->provider_triple = $packagedelivery->provider_triple;
        $this->provider_quadruple = $packagedelivery->provider_quadruple;
        $this->provider_children_under_10 = $packagedelivery->provider_children_under_10;
        $this->client_simple = $packagedelivery->client_simple;
        $this->client_double = $packagedelivery->client_double;
        $this->client_triple = $packagedelivery->client_triple;
        $this->client_quadruple = $packagedelivery->client_quadruple;
        $this->client_children_under_10 = $packagedelivery->client_children_under_10;
        
        $this->stars = $packagedelivery->stars;
    }

    public function cancelEdit()
    {
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->hotel_name = '';
        $this->days_nights = '';
        $this->city = '';
        $this->provider_simple = '';
        $this->provider_double = '';
        $this->provider_triple = '';
        $this->provider_quadruple = '';
        $this->provider_children_under_10 ='';
        $this->client_simple = '';
        $this->client_double = '';
        $this->client_triple = '';
        $this->client_quadruple = '';
        $this->client_children_under_10 = '';
        $this->stars = '';
        $this->editId = null;
    }

    public function delete($id)
    {
        $packagedelivery = ModelsPackageDelivery::findOrFail($id);
        $this->resetForm();
        $packagedelivery->delete();
    }
}

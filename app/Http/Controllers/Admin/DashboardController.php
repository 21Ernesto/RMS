<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Mail;
use App\Models\SaleDelivery;
use App\Models\SaleInn;
use App\Models\SalePromo;
use App\Models\Trip;

class DashboardController extends Controller
{
    public function index()
    {

        $detacados = Trip::where('outstanding', 1)->count();
        $totalProductos = Trip::count();
        $totalCorreos = Mail::count();
        $totalCategory = Category::count();
        $gananciasTour = SaleInn::where('type_trips', 'tour')->sum('total');
        $gananciasCombo = SaleInn::where('type_trips', 'friendscombos')->sum('total');
        $gananciasPaquetes = SaleDelivery::where('type_trips', 'packages')->sum('total');
        $gananciasTren = SaleDelivery::where('type_trips', 'mayantrains')->sum('total');
        $gananciasPaque = SaleDelivery::where('type_trips', 'travelpackages')->sum('total');
        $gananciasPromo = SalePromo::sum('total');

        return view('admin.dashboard', compact('detacados', 'totalProductos', 'totalCorreos', 'totalCategory', 'gananciasTour', 'gananciasCombo', 'gananciasPaquetes', 'gananciasTren', 'gananciasPaque', 'gananciasPromo'));
    }
}

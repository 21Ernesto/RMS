<?php

namespace App\Http\Controllers;

use App\Models\CarGallery;
use App\Models\Menu;
use App\Models\Team;

class NosotrosController extends Controller
{
    public function index()
    {
        $equipo = Team::all();
        $cars = CarGallery::all();
        $menus = Menu::where('status', 1)->get();

        return view('public.nosotros', compact('equipo', 'cars', 'menus'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Trip;

class InicioController extends Controller
{
    public function index()
    {
        $outstandings = Trip::where('outstanding', 1)->get();

        $menus = Menu::where('status', 1)->get();

        return view('public.index', compact('outstandings', 'menus'));
    }

    public function exits()
    {
        $menus = Menu::where('status', 1)->get();

        return view('public.comprafinalizada', compact('menus'));
    }

    public function privacy()
    {
        $menus = Menu::where('status', 1)->get();

        return view('public.aviso_de_privacidad', compact('menus'));
    }
    public function terminos()
    {
        $menus = Menu::where('status', 1)->get();

        return view('public.terminos_condiciones', compact('menus'));
    }
}

<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Menu;

class MenuController extends Controller
{
    public function show($slug)
    {
        $menu = Menu::where('slug', $slug)->with('categories')->firstOrFail();
        $menus = Menu::where('status', 1)->get();

        return view('public.menu', compact('menu', 'menus'));
    }
}

<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->with('trips')->firstOrFail();
        $menus = Menu::where('status', 1)->get();;

        return view('public.categories', compact('category', 'menus'));
    }
}

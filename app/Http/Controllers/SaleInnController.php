<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleInnController extends Controller
{
    public function index()
    {
        return view('admin.sale-inn');
    }
}

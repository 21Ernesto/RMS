<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleDeliveryController extends Controller
{
    public function index()
    {
        return view('admin.sale-delivery');
    }
}
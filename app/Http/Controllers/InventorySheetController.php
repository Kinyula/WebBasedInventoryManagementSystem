<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventorySheetController extends Controller
{
    public function index()
    {
        return view('chas-inventory-sheet');
    }
}

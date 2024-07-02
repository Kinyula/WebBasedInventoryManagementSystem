<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsumableItemsController extends Controller
{
    public function index()
    {
        return view('consumable-items');
    }
}

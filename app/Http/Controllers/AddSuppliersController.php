<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddSuppliersController extends Controller
{
    public function index()
    {
        return view('add-suppliers');
    }
}

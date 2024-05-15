<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateSuppliersController extends Controller
{
    public function index($id)
    {
        return view('update-suppliers', compact('id'));
    }
}

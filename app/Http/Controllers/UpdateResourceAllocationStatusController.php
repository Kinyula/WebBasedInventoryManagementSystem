<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateResourceAllocationStatusController extends Controller
{
    public function index($id)
    {
        return view('update-resource-allocation', compact('id'));
    }
}

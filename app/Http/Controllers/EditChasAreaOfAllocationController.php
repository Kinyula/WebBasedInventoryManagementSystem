<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditChasAreaOfAllocationController extends Controller
{
    public function index($id)
    {
        return view('edit-chas-area-allocation', compact('id'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceAllocationController extends Controller
{
    public function index()
    {

        return view('resource-allocations');
    }
}

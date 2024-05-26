<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceAllocationToAreasController extends Controller
{
    public function index(){

        return view('allocate-resources-to-areas');

    }
}

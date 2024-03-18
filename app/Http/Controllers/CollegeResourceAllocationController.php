<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollegeResourceAllocationController extends Controller
{
    public function index(){
        return view('college-resource-allocation');
    }
}

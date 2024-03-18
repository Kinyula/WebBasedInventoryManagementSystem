<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewCollegeAllocationsController extends Controller
{
    public function index()
    {
        return view('view-college-allocated-resources');
    }
}

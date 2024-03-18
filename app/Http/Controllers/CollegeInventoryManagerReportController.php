<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollegeInventoryManagerReportController extends Controller
{
    public function index()
    {
        return view('college-inventory-manager-report');
    }
}

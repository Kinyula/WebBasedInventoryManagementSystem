<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CobeReportController extends Controller
{
    public function index()
    {
        return view('cobe-reports');
    }
}

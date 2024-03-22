<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoedReportController extends Controller
{
    public function index()
    {
        return view('coed-reports');
    }
}

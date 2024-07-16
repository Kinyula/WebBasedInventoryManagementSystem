<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoedDetailsReportController extends Controller
{
    public function index()
    {
        return view('coed-details-report');
    }
}

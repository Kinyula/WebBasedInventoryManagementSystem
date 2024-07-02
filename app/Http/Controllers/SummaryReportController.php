<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SummaryReportController extends Controller
{
    public function index()
    {
        return view('chas-summary-report');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoeseReportController extends Controller
{
    public function index()
    {
        return view('coese-reports');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChssReportController extends Controller
{
    public function index()
    {
        return view('chss-reports');
    }
}

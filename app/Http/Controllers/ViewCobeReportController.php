<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewCobeReportController extends Controller
{
    public function index()
    {
        return view('view-cobe-reports');
    }
}

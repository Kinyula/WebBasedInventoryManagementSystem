<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewCoedReportController extends Controller
{
    public function index()
    {
        return view('view-coed-reports');
    }
}

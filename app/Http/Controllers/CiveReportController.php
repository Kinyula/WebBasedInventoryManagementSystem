<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CiveReportController extends Controller
{
    public function index()
    {
        return view('cive-reports');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChasReportController extends Controller
{
    public function index()
    {
        return view('chas-reports');
    }
}

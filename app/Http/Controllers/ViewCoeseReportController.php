<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewCoeseReportController extends Controller
{
    public function index()
    {
        return view('view-coese-reports');
    }
}

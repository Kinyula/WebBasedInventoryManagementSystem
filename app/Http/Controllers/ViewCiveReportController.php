<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewCiveReportController extends Controller
{
    public function index()
    {
        return view('view-cive-reports');
    }
}

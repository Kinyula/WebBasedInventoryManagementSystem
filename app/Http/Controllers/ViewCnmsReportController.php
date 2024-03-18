<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewCnmsReportController extends Controller
{
    public function index()
    {
        return view('view-cnms-report');
    }
}

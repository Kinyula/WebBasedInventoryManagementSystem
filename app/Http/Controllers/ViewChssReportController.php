<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewChssReportController extends Controller
{
    public function index()
    {
        return view('view-chss-report');
    }
}

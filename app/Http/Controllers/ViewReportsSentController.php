<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewReportsSentController extends Controller
{
    public function index()
    {
        return view('view-reports-sent');
    }
}

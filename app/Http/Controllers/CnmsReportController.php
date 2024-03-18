<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CnmsReportController extends Controller
{
    public function index(){

        return view('cnms-reports');
    }
}

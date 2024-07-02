<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChasDetailsReportController extends Controller
{
    public function index(){

        return view('chas-details-report');
    }
}

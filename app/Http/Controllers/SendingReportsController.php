<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendingReportsController extends Controller
{
    public function index()
    {
        return view('sending-reports');
    }
}

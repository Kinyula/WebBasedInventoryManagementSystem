<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagingReportController extends Controller
{
    public function index()
    {
        return view('view-report-messages');
    }
}

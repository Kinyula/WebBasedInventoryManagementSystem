<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailReportPageLinksController extends Controller
{
    public function index()
    {
        return view('detail-reports-page-links');
    }
}

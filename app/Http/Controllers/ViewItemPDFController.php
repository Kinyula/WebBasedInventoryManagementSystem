<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewItemPDFController extends Controller
{
    public function index()
    {
        return view('view-items-pdf');
    }
}

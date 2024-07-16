<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaintananceStatusCobeController extends Controller
{
    public function index()
    {
        return view('maintanance-status-cobe');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaintananceStatusCiveController extends Controller
{
    public function index()
    {
        return view('maintanance-status-cive');
    }
}

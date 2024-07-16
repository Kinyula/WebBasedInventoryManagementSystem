<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaintananceStatusController extends Controller
{
    public function index()
    {
        return view('maintanance-status');
    }
}

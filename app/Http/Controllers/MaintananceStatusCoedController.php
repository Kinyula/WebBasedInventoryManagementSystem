<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaintananceStatusCoedController extends Controller
{
    public function index()
    {
        return view('maintanance-status-coed');
    }
}

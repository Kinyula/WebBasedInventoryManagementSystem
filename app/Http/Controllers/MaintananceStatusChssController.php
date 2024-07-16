<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaintananceStatusChssController extends Controller
{
    public function index()
    {
        return view('maintainance-status-chss');
    }
}

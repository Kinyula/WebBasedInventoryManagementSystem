<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaintanancePageLinksController extends Controller
{
    public function index()
    {
        return view('maintanance-page-links');
    }
}

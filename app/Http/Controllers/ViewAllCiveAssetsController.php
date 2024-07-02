<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewAllCiveAssetsController extends Controller
{
    public function index()
    {
        return view('view-all-cive-assets');
    }
}

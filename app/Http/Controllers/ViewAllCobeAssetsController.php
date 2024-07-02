<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewAllCobeAssetsController extends Controller
{
    public function index()
    {
        return view('view-all-cobe-assets');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewAllCoedAssetsController extends Controller
{
    public function index()
    {
        return view('view-all-coed-assets');
    }
}

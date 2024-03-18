<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssetStatusController extends Controller
{
    public function index(){
        return view('asset-status');
    }
}

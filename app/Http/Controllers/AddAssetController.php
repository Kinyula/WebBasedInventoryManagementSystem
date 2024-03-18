<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddAssetController extends Controller
{
    public function index(){
        return view('add-asset');
    }
}

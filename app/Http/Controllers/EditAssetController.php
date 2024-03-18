<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditAssetController extends Controller
{
    public function index($id){
        return view('edit-asset', compact('id'));
    }
}

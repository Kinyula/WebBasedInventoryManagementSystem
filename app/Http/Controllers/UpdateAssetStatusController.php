<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateAssetStatusController extends Controller
{
    public function index($id)
    {

        return view('update-asset-status', compact('id'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditChasResourceStatusController extends Controller
{
    public function index($id)
    {
        return view('edit-chas-resource-status', compact('id'));
    }
}

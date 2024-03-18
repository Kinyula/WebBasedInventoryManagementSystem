<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditCiveResourceStatusController extends Controller
{
    public function index($id)
    {
        return view('edit-cive-resource-status', compact('id'));
    }
}

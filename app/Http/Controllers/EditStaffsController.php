<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditStaffsController extends Controller
{
    public function index($id)
    {
        return view('edit-staff', compact('id'));
    }
}

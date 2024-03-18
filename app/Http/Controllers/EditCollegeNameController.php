<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditCollegeNameController extends Controller
{
    public function index($id)
    {
        return view('edit-college-name', compact('id'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffManagementController extends Controller
{
    public function index()
    {
        return view('add-staff');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewCollegeInventoryManagerController extends Controller
{
    public function index()
    {
        return view('view-college-inventory-manager');
    }
}

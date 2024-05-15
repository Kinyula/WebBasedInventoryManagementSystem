<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewCategoriesController extends Controller
{
    public function index()
    {
        return view('view-categories');
    }
}

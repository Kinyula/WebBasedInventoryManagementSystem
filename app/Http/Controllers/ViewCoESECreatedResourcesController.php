<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewCoESECreatedResourcesController extends Controller
{
    public function index()
    {
        return view('view-coese-created-resources');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewCoBECreatedResourcesController extends Controller
{
    public function index()
    {
        return view('view-cobe-created-resources');
    }
}

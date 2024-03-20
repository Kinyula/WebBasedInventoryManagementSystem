<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewChasCreatedResourcesController extends Controller
{
    public function index()
    {
        return view('view-chas-created-resources');
    }
}

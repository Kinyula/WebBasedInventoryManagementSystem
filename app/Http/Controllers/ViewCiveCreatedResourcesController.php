<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewCiveCreatedResourcesController extends Controller
{
    public function index()
    {
        return view('view-cive-created-resources');
    }
}

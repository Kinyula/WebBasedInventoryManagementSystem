<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewCoEDCreatedResourcesController extends Controller
{
    public function index()
    {
        return view('view-coed-created-resources');
    }
}

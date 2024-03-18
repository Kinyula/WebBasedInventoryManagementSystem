<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewAllocatedResourcesController extends Controller
{
    public function index(){
        return view('view-allocated-resources');
    }
}

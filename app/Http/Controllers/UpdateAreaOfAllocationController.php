<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateAreaOfAllocationController extends Controller
{
    public function index($id){

        return view('update-resource-to-areas-allocation', compact('id'));
    }
}

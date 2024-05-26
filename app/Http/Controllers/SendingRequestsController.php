<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendingRequestsController extends Controller
{
    public function index(){
        
        return view('view-requests-sent');
    }
}

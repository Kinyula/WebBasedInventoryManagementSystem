<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewPhoneNumbersController extends Controller
{
    public function index(){
        return view('view-phone-numbers');
    }
}

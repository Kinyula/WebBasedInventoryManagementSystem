<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChasVerificationAndApprovalController extends Controller
{
    public function index()
    {
        return view('verification-and-approval');
    }
}

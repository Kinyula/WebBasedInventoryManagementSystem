<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrCodeReaderController extends Controller
{
    public function index()
    {
        return view('qr-code-reader');
    }
}

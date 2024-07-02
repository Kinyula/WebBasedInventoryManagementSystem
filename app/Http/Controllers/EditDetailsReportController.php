<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditDetailsReportController extends Controller
{
    public function index($id)
    {
        return view('edit-details-report', compact('id'));
    }
}

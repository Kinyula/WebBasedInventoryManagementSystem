<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditConsumableItemsController extends Controller
{
    public function index($id)
    {
        return view('edit-chas-consumable-items', compact('id'));
    }
}

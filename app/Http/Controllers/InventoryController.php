<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function newInventory()
    {
        return view('new-inventory');
    }
}

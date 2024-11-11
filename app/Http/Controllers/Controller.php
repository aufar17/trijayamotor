<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function index()
    {
        return view('index');
    }

    public function inventory()
    {
        $inventories = Inventory::all();
        $data = [
            'inventories' => $inventories
        ];

        return view('inventory', $data);
    }
    public function service()
    {
        return view('service');
    }
    public function supplier()
    {
        return view('supplier');
    }
}

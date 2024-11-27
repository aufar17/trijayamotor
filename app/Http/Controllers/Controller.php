<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Service;
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
    public function transaction()
    {
        return view('transaction');
    }
    public function service()
    {
        $services = Service::all();
        $data = [
            'services' => $services
        ];
        return view('service', $data);
    }
    public function supplier()
    {
        return view('supplier');
    }
    public function customer()
    {
        return view('customer');
    }
}

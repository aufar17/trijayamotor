<?php

namespace App\Http\Controllers;

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
        return view('inventory');
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

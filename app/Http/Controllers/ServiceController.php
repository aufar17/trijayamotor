<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function newService()
    {
        return view('new-service');
    }

    public function servicePost()
    {
        $services = request()->post();
        $data = [
            'code' => $services['code'],
            'name' => $services['name'],
            'description' => $services['description'],
            'price' => $services['price'],
        ];

        $res = Service::create($data);
        if (!$res) {
            return redirect()->route('new-service');
        }
        return redirect()->route('service')->with('success', 'Sparepart added successfully');
    }
}

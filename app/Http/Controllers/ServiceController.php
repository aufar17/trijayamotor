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

    public function editService($id)
    {
        $services = Service::where('id', $id)->first();

        if (!$services) {
            return redirect()->route('services')->with('error', 'Service not found');
        }


        $data = [
            'services' => $services,
        ];

        return view('edit-service', $data);
    }

    public function serviceUpdate()
    {
        $service = request()->post();
        if (!isset($service['id'])) {
            return redirect()->back()->with('error', 'service ID is missing');
        }


        $data = [
            'name' => $service['name'],
            'price' => $service['price'],
            'description' => $service['description'],
        ];

        $res = Service::where('id', $service['id'])->update($data);

        if (!$res) {
            return redirect()->route('edit-service')->with('error', 'Update failed');
        }

        return redirect()->route('service')->with('success', 'Service updated successfully');
    }

    public function serviceDelete()
    {
        $id = request()->post('id');
        $service = Service::where('id', $id)->first();
        if (!$service) {
            return redirect()->route('service')->with('error', 'Service not found');
        }

        $service->delete();

        return redirect()->route('service')->with('success', 'Service deleted successfully');
    }
}

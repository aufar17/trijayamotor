<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function newVehicle()
    {
        $customers = Customer::all();
        $data = [
            'customers' => $customers
        ];
        return view('new-vehicle', $data);
    }

    public function editVehicle($id)
    {
        $vehicle = Vehicle::with('customer')->where('id', $id)->first();

        if (!$vehicle) {
            return redirect()->route('vehicle')->with('error', 'Vehicle not found');
        }

        $customers = Vehicle::all();

        $data = [
            'vehicle' => $vehicle,
            'customers' => $customers,
        ];

        return view('edit-vehicle', $data);
    }


    public function detailvehicle($id)
    {
        $vehicle = Vehicle::where('id', $id)->first();
        if (!$vehicle) {
            return redirect()->route('vehicle')->with('error', 'Vehicle not found');
        }

        $data = [
            'vehicle' => $vehicle,
        ];
        return view('detail-vehicle', $data);
    }

    public function vehiclePost()
    {
        $vehicle = request()->post();
        $data = [
            'nopol' => $vehicle['nopol'],
            'cust_id' => $vehicle['cust_id'],
            'merk' => $vehicle['merk'],
            'model' => $vehicle['model'],
            'year' => $vehicle['year'],
            'engine_number' => $vehicle['engine_number'],
            'chasis_number' => $vehicle['chasis_number'],
        ];

        $res = Vehicle::create($data);
        if (!$res) {
            return redirect()->route('new-vehicle');
        }
        return redirect()->route('vehicle')->with('success', 'Vehicle added successfully');
    }

    public function vehicleUpdate()
    {
        $vehicle = request()->post();
        if (!isset($vehicle['id'])) {
            return redirect()->back()->with('error', 'Vehicle ID is missing');
        }


        $data = [
            'nopol' => $vehicle['nopol'],
            'cust_id' => $vehicle['cust_id'],
            'merk' => $vehicle['merk'],
            'model' => $vehicle['model'],
            'year' => $vehicle['year'],
            'engine_number' => $vehicle['engine_number'],
            'chasis_number' => $vehicle['chasis_number'],
        ];

        $res = Vehicle::where('id', $vehicle['id'])->update($data);

        if (!$res) {
            return redirect()->route('edit-vehicle')->with('error', 'Update failed');
        }

        return redirect()->route('vehicle')->with('success', 'Vehicle updated successfully');
    }
    public function vehicleDelete()
    {
        $id = request()->post('id');
        $vehicle = Vehicle::where('id', $id)->first();
        if (!$vehicle) {
            return redirect()->route('vehicle')->with('error', 'Vehicle not found');
        }

        $vehicle->delete();

        return redirect()->route('vehicle')->with('success', 'Vehicle deleted successfully');
    }
}

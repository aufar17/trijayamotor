<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Inventory;
use App\Models\Supplier;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function newcustomer()
    {
        return view('new-customer');
    }

    public function editcustomer($id)
    {
        $customer = Customer::where('id', $id)->first();

        if (!$customer) {
            return redirect()->route('customer')->with('error', 'customer not found');
        }


        $data = [
            'customer' => $customer,
        ];

        return view('edit-customer', $data);
    }


    public function detailcustomer($id)
    {
        $customer = Customer::where('id', $id)->first();
        if (!$customer) {
            return redirect()->route('customer')->with('error', 'customer not found');
        }

        $data = [
            'customer' => $customer,
        ];
        return view('detail-customer', $data);
    }

    public function customerPost()
    {
        $customer = request()->post();
        $data = [
            'code' => $customer['code'],
            'name' => $customer['name'],
            'phone' => $customer['phone'],
            'address' => $customer['address'],
            'province' => $customer['province'],
            'cities' => $customer['cities'],
        ];

        $res = Customer::create($data);
        if (!$res) {
            return redirect()->route('new-customer');
        }
        return redirect()->route('customer')->with('success', 'Customer added successfully');
    }

    public function customerUpdate()
    {
        $customer = request()->post();
        if (!isset($customer['id'])) {
            return redirect()->back()->with('error', 'customer ID is missing');
        }


        $data = [
            'code' => $customer['code'],
            'name' => $customer['name'],
            'phone' => $customer['phone'],
            'address' => $customer['address'],
            'province' => $customer['province'],
            'cities' => $customer['cities'],
        ];

        $res = Customer::where('id', $customer['id'])->update($data);

        if (!$res) {
            return redirect()->route('edit-customer')->with('error', 'Update failed');
        }

        return redirect()->route('customer')->with('success', 'Customer updated successfully');
    }
    public function customerDelete()
    {
        $id = request()->post('id');
        $customer = Customer::where('id', $id)->first();
        if (!$customer) {
            return redirect()->route('customer')->with('error', 'Customer not found');
        }

        $customer->delete();

        return redirect()->route('customer')->with('success', 'Customer deleted successfully');
    }
}

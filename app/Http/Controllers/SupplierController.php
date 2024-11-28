<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function newSupplier()
    {
        return view('new-supplier');
    }

    public function editSupplier($id)
    {

        $supplier = Supplier::where('id', $id)->first();
        if (!$supplier) {
            return redirect()->route('supplier')->with('error', 'Supplier not found');
        }

        $data = [
            'supplier' => $supplier,
        ];


        return view('edit-supplier', $data);
    }

    public function detailSupplier($id)
    {
        $supplier = Supplier::where('id', $id)->first();
        if (!$supplier) {
            return redirect()->route('supplier')->with('error', 'Supplier not found');
        }

        $data = [
            'supplier' => $supplier,
        ];
        return view('detail-supplier', $data);
    }

    public function supplierPost()
    {
        $supplier = request()->post();
        $data = [
            'code' => $supplier['code'],
            'name' => $supplier['name'],
            'email' => $supplier['email'],
            'phone' => $supplier['phone'],
            'address' => $supplier['address'],
            'province' => $supplier['province'],
            'cities' => $supplier['cities'],
            'bank' => $supplier['bank'],
            'bank_account' => $supplier['bank_account'],
        ];

        $res = Supplier::create($data);
        if (!$res) {
            return redirect()->route('new-supplier');
        }
        return redirect()->route('supplier')->with('success', 'Supplier added successfully');
    }

    public function supplierUpdate()
    {
        $supplier = request()->post();

            if (!isset($supplier['id'])) {
            return redirect()->back()->with('error', 'Supplier ID is missing');
        }



        $data = [
            'code' => $supplier['code'],
            'name' => $supplier['name'],
            'email' => $supplier['email'],
            'phone' => $supplier['phone'],
            'address' => $supplier['address'],
            'province' => $supplier['province'],
            'cities' => $supplier['cities'],
            'bank' => $supplier['bank'],
            'bank_account' => $supplier['bank_account'],
        ];


        $res = Supplier::where('id', $supplier['id'])->update($data);

        if (!$res) {
            return redirect()->route('edit-supplier', ['id' => $supplier['id']])->with('error', 'Update failed');
        }

        return redirect()->route('supplier')->with('success', 'Supplier updated successfully');
    }

    public function supplierDelete()
    {
        $id = request()->post('id');
        $supplier = Supplier::where('id', $id)->first();
        if (!$supplier) {
            return redirect()->route('supplier')->with('error', 'Supplier not found');
        }

        $supplier->delete();

        return redirect()->route('supplier')->with('success', 'Supplier deleted successfully');
    }
}

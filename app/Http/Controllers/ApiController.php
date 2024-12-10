<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);


        $user = User::where('username', $validatedData['username'])->first();

        $res = [
            'responseCode' => 1,
            'responseDesc' => 'Login Success',
            'responseData' => [$user],
        ];

        if ($user && Hash::check($validatedData['password'], $user->password)) {
            Session::put('user', $user);

            return response()->json($res);
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput($request->only('username'));
    }

    public function inventory()
    {
        $inventories = Inventory::all();
        $data = [
            'inventories' => $inventories
        ];

        $res = [
            'responseCode' => 1,
            'responseDesc' => 'Success Get Inventory',
            'responseData' => [$data],
        ];

        return response()->json($res);
    }

    public function newInventory()
    {
        $suppliers = Supplier::all();
        $data = [
            'suppliers' => $suppliers
        ];

        $res = [
            'responseCode' => 1,
            'responseDesc' => 'New Inventory Page',
            'responseData' => [$data]
        ];

        return response()->json($res);
    }

    public function editInventory($id)
    {
        $inventory = Inventory::with('supplier')->where('id', $id)->first();

        if (!$inventory) {
            return redirect()->route('inventory')->with('error', 'Inventory not found');
        }

        $suppliers = Supplier::all();

        $data = [
            'inventory' => $inventory,
            'suppliers' => $suppliers,
        ];

        $res = [
            'responseCode' => 1,
            'responseDesc' => 'Edit Inventory Page',
            'responseData' => [$data]
        ];

        return response()->json($res);
    }


    public function detailInventory($id)
    {
        $inventory = Inventory::where('id', $id)->first();
        if (!$inventory) {
            return redirect()->route('inventory')->with('error', 'inventory not found');
        }

        $data = [
            'inventory' => $inventory,
        ];

        $res = [
            'responseCode' => 1,
            'responseDesc' => 'Detail Inventory Page',
            'responseData' => [$data]
        ];

        return response()->json($res);
    }

    public function inventoryPost()
    {
        $inventory = request()->post();
        $data = [
            'code' => $inventory['code'],
            'supplier_id' => $inventory['supplier_id'],
            'name' => $inventory['name'],
            'description' => $inventory['description'],
            'stock' => $inventory['stock'],
            'purchase' => $inventory['purchase'],
            'sell' => $inventory['sell'],
            'location' => $inventory['location'],
        ];

        $failed = [
            'responseCode' => 0,
            'responseDesc' => 'Failed to add new Inventory',
        ];

        $res = Inventory::create($data);
        if (!$res) {
            return response()->json($failed);
        }

        $success = [
            'responseCode' => 1,
            'responseDesc' => 'Inventory added successfully',
            'responseData' => [$res]
        ];

        return response()->json($success);
    }

    public function inventoryUpdate()
    {
        $inventory = request()->post();
        if (!isset($inventory['id'])) {
            return redirect()->back()->with('error', 'Inventory ID is missing');
        }


        $data = [
            'code' => $inventory['code'],
            'supplier_id' => $inventory['supplier_id'],
            'name' => $inventory['name'],
            'description' => $inventory['description'],
            'stock' => $inventory['stock'],
            'purchase' => $inventory['purchase'],
            'sell' => $inventory['sell'],
            'location' => $inventory['location'],
        ];

        $failed = [
            'responseCode' => 0,
            'responseDesc' => 'Failed to update Inventory',
        ];

        $res = Inventory::where('id', $inventory['id'])->update($data);

        if (!$res) {
            return response()->json($failed);
        }

        $success = [
            'responseCode' => 1,
            'responseDesc' => 'Inventory updated successfully',
            'responseData' => [$res]
        ];

        return response()->json($success)->with('success', 'Sparepart updated successfully');
    }

    public function inventoryDelete()
    {
        $id = request()->post('id');
        $inventory = Inventory::where('id', $id)->first();

        $failed = [
            'responseCode' => 0,
            'responseDesc' => 'Id not found',
        ];

        if (!$inventory) {
            return response()->json($failed);
        }

        $inventory->delete();

        $success = [
            'responseCode' => 1,
            'responseDesc' => 'Inventory deleted successfully',
        ];

        return response()->json($success);
    }
}

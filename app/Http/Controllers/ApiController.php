<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
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
        $inventory = Inventory::all();
        $data = [
            'inventory' => $inventory
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
        $inventory = Inventory::where('id', $id)->first();

        if (!$inventory) {
            return redirect()->route('inventory')->with('error', 'Inventory not found');
        }


        $data = [
            'inventory' => $inventory,
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
            'name' => $inventory['name'],
            'description' => $inventory['description'],
            'stock' => $inventory['stock'] ?? 0,
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
    Log::info("Received inventory data: ", $inventory); // Log the incoming data

    if (!isset($inventory['id'])) {
        return response()->json([
            'responseCode' => 0,
            'responseDesc' => 'Inventory ID is missing'
        ]);
    }

    $data = [
        'code' => $inventory['code'],
        'name' => $inventory['name'],
        'description' => $inventory['description'],
        'stock' => $inventory['stock'] ?? 0,
        'sell' => $inventory['sell'],
        'location' => $inventory['location'],
    ];

    $res = Inventory::where('id', $inventory['id'])->update($data);

    if (!$res) {
        return response()->json([
            'responseCode' => 0,
            'responseDesc' => 'Failed to update Inventory',
        ]);
    }

    return response()->json([
        'responseCode' => 1,
        'responseDesc' => 'Inventory updated successfully',
        'responseData' => [$data]
    ]);
}


    public function inventoryDelete($id)
{
    $inventory = Inventory::find($id); 

    if (!$inventory) {
        return response()->json([
            'responseCode' => 0,
            'responseDesc' => 'Id not found',
        ]);
    }

    $inventory->delete();

    return response()->json([
        'responseCode' => 1,
        'responseDesc' => 'Inventory deleted successfully',
    ]);
}


}

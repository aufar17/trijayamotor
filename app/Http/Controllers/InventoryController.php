<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function newInventory()
    {
        return view('new-inventory');
    }

    public function editInventory($id)
    {
        $inventory = Inventory::where('id', $id)->first();
        if (!$inventory) {
            return redirect()->route('inventory')->with('error', 'inventory not found');
        }

        $data = [
            'inventory' => $inventory,
        ];


        return view('edit-inventory', $data);
    }

    public function inventoryPost()
    {
        $inventory = request()->post();
        $data = [
            'code' => $inventory['code'],
            'name' => $inventory['name'],
            'description' => $inventory['description'],
            'stock' => $inventory['stock'],
            'purchase' => $inventory['purchase'],
            'sell' => $inventory['sell'],
            'location' => $inventory['location'],
            'entry' => $inventory['entry'],
        ];

        $res = Inventory::create($data);
        if (!$res) {
            return redirect()->route('new-inventory');
        }
        return redirect()->route('inventory')->with('success', 'Sparepart added successfully');
    }

    public function inventoryUpdate()
    {
        $inventory = request()->post();

        if (!isset($inventory['id'])) {
            return redirect()->route('edit-inventory')->with('error', 'Inventory ID is missing');
        }

        $data = [
            'code' => $inventory['code'],
            'name' => $inventory['name'],
            'description' => $inventory['description'],
            'stock' => $inventory['stock'],
            'purchase' => $inventory['purchase'],
            'sell' => $inventory['sell'],
            'location' => $inventory['location'],
            'entry' => $inventory['entry'],
        ];

        $res = Inventory::where('id', $inventory['id'])->update($data);

        if (!$res) {
            return redirect()->route('edit-inventory')->with('error', 'Update failed');
        }

        return redirect()->route('inventory')->with('success', 'Inventory updated successfully');
    }
    public function inventoryDelete()
    {
        $id = request()->post('id');
        $inventory = Inventory::where('id', $id)->first();
        if (!$inventory) {
            return redirect()->route('inventory')->with('error', 'Inventory not found');
        }

        $inventory->delete();

        return redirect()->route('inventory')->with('success', 'Inventory deleted successfully');
    }
}

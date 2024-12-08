<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Inventory;
use App\Models\Service;
use App\Models\Supplier;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Routing\Controller as BaseController;

class MainController extends Controller
{

    public function login()
    {

        return view('login');
    }

    public function index()
    {
        $users = User::all();
        $data = [
            'user' => $users
        ];
        return view('index', $data);
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
        $transactions = Transaction::all();
        $data = [
            'transactions' => $transactions,
        ];
        return view('transaction', $data);
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
        $suppliers = Supplier::all();
        $data = [
            'suppliers' => $suppliers
        ];

        return view('supplier', $data);
    }
    public function customer()
    {
        $customers = Customer::all();
        $data = [
            'customers' => $customers
        ];

        return view('customer', $data);
    }
    public function vehicle()
    {
        $vehicles = Vehicle::all();
        $data = [
            'vehicles' => $vehicles
        ];

        return view('vehicle', $data);
    }
}

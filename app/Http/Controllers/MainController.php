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
        $users = session('user');
        $transactions =  Transaction::with(['vehicle','vehicle.customer','transactionInventory','transactionInventory.inventory','transactionService','transactionService.service'])->get();
        $totalTransactions = Transaction::count();
        $totalIncome = Transaction::sum('total');
        $totalSpareparts = Inventory::count();
        $totalSuppliers = Supplier::count();

        $data = [
            'users' => $users,
            'transactions' => $transactions,
            'totalTransactions' => $totalTransactions,
            'totalIncome' => $totalIncome,
            'totalSpareparts' => $totalSpareparts,
            'totalSuppliers' => $totalSuppliers,
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
        $transactions =  Transaction::with(['vehicle','transactionInventory','transactionService'])->get();
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
        $vehicles = Vehicle::with('customer')->get();
        $data = [
            'vehicles' => $vehicles
        ];

        return view('vehicle', $data);
    
    }
    public function settings()
    {
        $users = User::all();
        $user = session('user');
        $data = [
            'users' => $users,
            'userSession' => $user
        ];

        return view('settings',$data);
    }
}

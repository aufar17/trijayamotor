<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\VehicleController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('login', [Controller::class, 'login'])->name('login');
Route::get('/', [Controller::class, 'index'])->name('index');
Route::get('inventory', [Controller::class, 'inventory'])->name('inventory');
Route::get('transaction', [Controller::class, 'transaction'])->name('transaction');
Route::get('service', [Controller::class, 'service'])->name('service');
Route::get('supplier', [Controller::class, 'supplier'])->name('supplier');
Route::get('customer', [Controller::class, 'customer'])->name('customer');
Route::get('vehicle', [Controller::class, 'vehicle'])->name('vehicle');


//User
Route::post('login-process', [LoginController::class, 'loginProcess'])->name('login-process');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


// Inventory
Route::get('new-inventory', [InventoryController::class, 'newInventory'])->name('new-inventory');
Route::post('add-inventory', [InventoryController::class, 'inventoryPost'])->name('inventory-post');
Route::get('edit-inventory/{id}', [InventoryController::class, 'editInventory'])->name('edit-inventory');
Route::post('update-inventory', [InventoryController::class, 'inventoryUpdate'])->name('update-inventory');
Route::post('delete-inventory', [InventoryController::class, 'inventoryDelete'])->name('delete-inventory');
Route::get('detail-inventory/{id}', [InventoryController::class, 'detailInventory'])->name('detail-inventory');



//Service
Route::get('new-service', [ServiceController::class, 'newService'])->name('new-service');
Route::post('add-service', [ServiceController::class, 'ServicePost'])->name('service-post');
Route::get('edit-service/{id}', [ServiceController::class, 'editService'])->name('edit-service');
Route::post('update-service', [ServiceController::class, 'serviceUpdate'])->name('update-service');
Route::post('delete-service', [ServiceController::class, 'serviceDelete'])->name('delete-service');
Route::get('detail-service/{id}', [ServiceController::class, 'serviceInventory'])->name('detail-service');


//Transaction
Route::get('new-transaction', [TransactionController::class, 'newTransaction'])->name('new-transaction');
Route::post('add-transaction', [TransactionController::class, 'transactionPost'])->name('transaction-post');
Route::get('edit-transaction', [TransactionController::class, 'editTransaction'])->name('edit-transaction');
Route::post('update-transaction', [TransactionController::class, 'transactionUpdate'])->name('update-transaction');
Route::post('delete-transaction', [TransactionController::class, 'transactionDelete'])->name('delete-transaction');
Route::get('detail-transaction/{id}', [TransactionController::class, 'detailInventory'])->name('detail-transaction');

//Supplier
Route::get('new-supplier', [SupplierController::class, 'newSupplier'])->name('new-supplier');
Route::post('add-supplier', [SupplierController::class, 'supplierPost'])->name('supplier-post');
Route::get('edit-supplier/{id}', [SupplierController::class, 'editSupplier'])->name('edit-supplier');
Route::post('update-supplier', [SupplierController::class, 'supplierUpdate'])->name('update-supplier');
Route::post('delete-supplier', [SupplierController::class, 'supplierDelete'])->name('delete-supplier');
Route::get('detail-supplier/{id}', [SupplierController::class, 'detailSupplier'])->name('detail-supplier');

//Customer
Route::get('new-customer', [CustomerController::class, 'newCustomer'])->name('new-customer');
Route::post('add-customer', [CustomerController::class, 'customerPost'])->name('customer-post');
Route::get('edit-customer/{id}', [CustomerController::class, 'editCustomer'])->name('edit-customer');
Route::post('update-customer', [CustomerController::class, 'customerUpdate'])->name('update-customer');
Route::post('delete-customer', [CustomerController::class, 'customerDelete'])->name('delete-customer');
Route::get('detail-customer/{id}', [CustomerController::class, 'detailCustomer'])->name('detail-customer');

//Vehicle
Route::get('new-vehicle', [VehicleController::class, 'newVehicle'])->name('new-vehicle');
Route::post('add-vehicle', [VehicleController::class, 'vehiclePost'])->name('vehicle-post');
Route::get('edit-vehicle/{id}', [VehicleController::class, 'editVehicle'])->name('edit-vehicle');
Route::post('update-vehicle', [VehicleController::class, 'vehicleUpdate'])->name('update-vehicle');
Route::post('delete-vehicle', [VehicleController::class, 'vehicleDelete'])->name('delete-vehicle');
Route::get('detail-vehicle/{id}', [VehicleController::class, 'detailVehicle'])->name('detail-vehicle');

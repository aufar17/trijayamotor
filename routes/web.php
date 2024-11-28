<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TransactionController;

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
Route::get('detail-transaction/{id}', [TransactionController::class, 'transactionInventory'])->name('detail-transaction');

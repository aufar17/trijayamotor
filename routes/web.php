<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LoginController;

// Route::get('/', function () {
//     return view('welcome');
// }); 

Route::get('login', [Controller::class, 'login'])->name('login');
Route::get('/', [Controller::class, 'index'])->name('index');
Route::get('inventory', [Controller::class, 'inventory'])->name('inventory');
Route::get('service', [Controller::class, 'service'])->name('service');
Route::get('supplier', [Controller::class, 'supplier'])->name('supplier');

//Login
// Route::post('login-process', [LoginController::class, 'loginProcess'])->name('login-process');


// Inventory
Route::get('new-inventory', [InventoryController::class, 'newInventory'])->name('new-inventory');
Route::post('add-inventory', [InventoryController::class, 'inventoryPost'])->name('inventory-post');
Route::get('edit-inventory/{id}', [InventoryController::class, 'editInventory'])->name('edit-inventory');
Route::post('update-inventory', [InventoryController::class, 'inventoryUpdate'])->name('inventory-update');
Route::post('delete-inventory', [InventoryController::class, 'inventoryDelete'])->name('delete-inventory');

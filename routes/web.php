<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\InventoryController;

// Route::get('/', function () {
//     return view('welcome');
// }); 

Route::get('/', [Controller::class, 'index'])->name('index');
Route::get('inventory', [Controller::class, 'inventory'])->name('inventory');
Route::get('service', [Controller::class, 'service'])->name('service');
Route::get('supplier', [Controller::class, 'supplier'])->name('supplier');

// Inventory
Route::get('new-inventory', [InventoryController::class, 'newInventory'])->name('new-inventory');

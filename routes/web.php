<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LoginController;

// Route::get('/', function () {
//     return view('welcome');
// }); 

Route::get('/', [Controller::class, 'index'])->name('index');
Route::get('login', [Controller::class, 'login'])->name('login');
Route::get('inventory', [Controller::class, 'inventory'])->name('inventory');
Route::get('service', [Controller::class, 'service'])->name('service');
Route::get('supplier', [Controller::class, 'supplier'])->name('supplier');

//Login
// Route::post('login-process', [LoginController::class, 'loginProcess'])->name('login-process');


// Inventory
Route::get('new-inventory', [InventoryController::class, 'newInventory'])->name('new-inventory');

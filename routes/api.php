<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::post('login', [ApiController::class, 'login'])->name('api.login');

Route::get('inventory', [ApiController::class, 'inventory'])->name('api.inventory');

Route::get('new-inventory', [ApiController::class, 'newInventory'])->name('new-inventory');

Route::post('add-inventory', [ApiController::class, 'inventoryPost'])->name('inventory-post');

Route::get('edit-inventory/{id}', [ApiController::class, 'editInventory'])->name('edit-inventory');

Route::post('update-inventory', [ApiController::class, 'inventoryUpdate'])->name('update-inventory');

Route::post('delete-inventory', [ApiController::class, 'inventoryDelete'])->name('delete-inventory');

Route::get('detail-inventory/{id}', [ApiController::class, 'detailInventory'])->name('detail-inventory');

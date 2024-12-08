<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::post('login', [ApiController::class, 'login'])->name('api.login');

<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Route;


Route::resource('/login', ApiController::class);

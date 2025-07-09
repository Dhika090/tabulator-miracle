<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/auth/digio-jwt-login', [AuthController::class, 'loginFromDigioToken']);




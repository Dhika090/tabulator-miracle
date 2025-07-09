<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/auth/digio-login/{provider}', [AuthController::class, 'loginFromDigio']);

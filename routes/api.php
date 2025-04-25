<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\VehicleController;
use App\Http\Controllers\API\DeviceController;
use App\Http\Controllers\API\TrackingDataController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('vehicles', VehicleController::class);
    Route::apiResource('devices', DeviceController::class);
    Route::apiResource('tracking-data', TrackingDataController::class);
    
    // ✅ Future authenticated GPS routes go here
    // Route::get('/track', [GpsController::class, 'track']);
});

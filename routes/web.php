<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Protected admin-only route (requires Sanctum and role 'admin')
Route::middleware(['auth:sanctum', 'role:admin'])->get('/admin-only', function () {
    return 'Admin content';
});
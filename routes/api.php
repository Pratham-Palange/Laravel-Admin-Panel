<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('medicines', MedicineController::class);

Route::get('/medicines/category/{categoryId}', [MedicineController::class, 'categoryWise']);
Route::get('/medicines/brand/{brandId}', [MedicineController::class, 'brandWise']);
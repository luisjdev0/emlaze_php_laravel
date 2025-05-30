<?php

use App\Http\Controllers\ProductoController;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['web', 'auth'])->group(function () {
    Route::apiResource('productos', ProductoController::class);
    Route::get('/productos/{sku}', function ($sku) {
        return response()->json(Producto::where('sku', $sku)->first());
    });
});

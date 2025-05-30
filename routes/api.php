<?php

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/productos', function () {
        return response()->json(Producto::all());
    });

    Route::get('/productos/{sku}', function ($sku) {
        return response()->json(Producto::where('sku', $sku)->first());
    });
});

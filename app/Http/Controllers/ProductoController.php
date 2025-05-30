<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Mostrar todos los productos
    public function index()
    {
        return response()->json(Producto::all());
    }

    // Crear un nuevo producto
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sku' => 'required|integer|unique:productos',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'cantidad' => 'required|numeric',
            'precio' => 'required|numeric',
            'total' => 'required|numeric',
            'fecha_creacion' => 'nullable|date',
        ]);

        $producto = Producto::create($validated);

        return response()->json($producto, 200);
    }

    // Mostrar un producto específico por sku
    public function show($sku)
    {
        $producto = Producto::where('sku', $sku)->firstOrFail();
        return response()->json($producto);
    }

    // Actualizar un producto por sku
    public function update(Request $request, $sku)
    {
        $producto = Producto::where('sku', $sku)->firstOrFail();

        $validated = $request->validate([
            'sku' => "required|integer|unique:productos,sku,{$producto->id}",
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'cantidad' => 'required|numeric',
            'precio' => 'required|numeric',
            'total' => 'required|numeric',
            'fecha_creacion' => 'nullable|date',
        ]);

        $producto->update($validated);

        return response()->json($producto);
    }

    // Eliminar un producto por sku
    public function destroy($sku)
    {
        $producto = Producto::where('sku', $sku)->firstOrFail();
        $producto->delete();

        return response()->json(['message' => 'Producto eliminado']);
    }
}

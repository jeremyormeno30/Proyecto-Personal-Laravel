<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class RegistroVentaController extends Controller
{
    public function index()
    {
        // Lógica del controlador para la acción "index"
        $products = [];

        return view('admin.registroventa', compact('products'));
    }

    public function buscarProducto(Request $request)
    {
    $request->validate([
        'barcode' => 'required|exists:products,barcode',
    ]);

    $product = Product::where('barcode', $request->barcode)->first();

    return response()->json($product);
    }

    public function limpiarBusquedas(Request $request)
    {
        // Limpiar los resultados en la sesión
        $request->session()->forget('products');

        return redirect()->route('registroventa');
    }
}

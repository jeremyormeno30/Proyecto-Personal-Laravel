<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index()
    {
        $authenticated_user = Auth::user();
        // dd($categories); // El dd es su mejor alternativa para depurar el código
        $categories = Category::with('products')->orderBy('id', 'desc')->get();
        return View('admin.agregarEliminar')->with([
            'user' => $authenticated_user,
            'categories' => $categories
        ]);
    }

    public function vista()
    {
        $authenticated_user = Auth::user();
        $pruductos = Product::all();
        $categories = Category::with('products')->orderBy('id', 'desc')->get();
        return View('admin.vistaproducto')->with([
            'user' => $authenticated_user,
            'categories' => $categories,
            'products' => $pruductos
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'barcode' => 'required|unique:products,barcode',
            'name' => 'required',
            'stocks' => 'required',
            'price' => 'required'
        ]);
        Product::create([
            'category_id' => $request->category_id,
            'barcode' => $request->barcode,
            'name' => $request->name,
            'stocks' => $request->stocks,
            'price' => $request->price
        ]);
        return redirect()->route('products.vista');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('home');
    }

    public function buscarPorCodigoBarras(Request $request)
    {
        $barcode = $request->input('codigoBarras');
        $product = Product::where('codigo_barras', $barcode)->first();

        return view('productos.buscar', ['product' => $product]);
    }
}

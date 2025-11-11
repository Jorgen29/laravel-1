<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $listofProducts = Product::all();
        return view('products.index', ['products' => $listofProducts]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            // use numeric for broader compatibility; you can use a regex to enforce 2 decimal places if needed
            'price' => 'required|numeric|min:0',
            'qty' => 'required|integer|min:0',
            'description' => 'nullable|string'
        ]);
        $createNewProduct = Product::create($data);
        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

     public function edit(Product $product)
    {
       
        return view('products.edit', ['product' => $product]);
    }
    public function update(Product $product, Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'qty' => 'required|integer|min:0',
            'description' => 'nullable|string'
        ]);

        $product->update($data);

        return redirect(route('products.index'))->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}

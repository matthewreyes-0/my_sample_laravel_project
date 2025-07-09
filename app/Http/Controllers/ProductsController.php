<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function index() {
        $products = Products::all();

        return view('products.index', ['products' => $products]);
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {
        // dd($request);
        $data = $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer',
            'price' => ['required', 'regex:/^\d+(\.\d{0,2})?$/'],
            'description' => 'nullable'
        ]);

        $newProduct = Products::create($data);

        return redirect(route('products.index'))->with('success', 'Product added successfully!');
    }

    public function update(Products $products) {
        // dd($request);
        return view('products.update', ['product' => $products]);
    }

    public function edit(Products $products, Request $request) {
        // dd($request);
        $data = $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer',
            'price' => ['required', 'regex:/^\d+(\.\d{0,2})?$/'],
            'description' => 'nullable'
        ]);

        $products->update($data);

        return redirect(route('products.index'))->with('success', 'Product updated successfully!');
    }

    public function delete(Products $products) {
        $products->delete();

        return redirect(route('products.index'))->with('success', 'Product deleted successfully!');
    }
}

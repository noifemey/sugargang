<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('products.index');
    }

    public function getProducts(Request $request)
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->title = $request->input('title');
        // $product->price = $request->input('price');
        // $product->sku = $request->input('sku');
        // $product->image = $request->input('image');
        // $product->url = $request->input('url');
        $product->ingredients = $request->input('ingredients');
        // $product->qty = $request->input('qty');
        $product->save();
        return redirect()->route('products');
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('products.show', ['product' => $product]);
    }

        //
        public function graph(Request $request)
        {
            return view('products.graph');
        }
    public function chartData(){
        $products = Product::all();
        $data = [];
    
        foreach ($products as $product) {
            $data[] = [
                'title' => $product->title,
                'quantity' => $product->qty,
            ];
        }
    
        return response()->json($data);
    }
}

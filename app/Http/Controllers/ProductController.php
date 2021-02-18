<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    
    public function index()
    {
        return view('products');
    }

    public function getProducts(){
        $product = Product::get();
        return $product;
    }
    
    public function store(ProductRequest $request)
    {
        Product::create($request->validated());

        return redirect()->route('products.index');
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

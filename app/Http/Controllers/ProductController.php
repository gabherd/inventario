<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
        $query = 'SELECT Measure.number as Measure, brand.name as Brand, brand.name as Model, Stock, Sale, Price 
                  FROM products as pro JOIN Measure on Measure.id_measure = pro.id_measure
                          JOIN model ON model.id_model = pro.id_model
                          JOIN brand ON brand.id_brand = brand.id_brand';

        $product = DB::select($query);
        return $product;
    }
    
    public function store(ProductRequest $request)
    {
        $request = Product::create($request->validated());
        
        if($request){
            $response = array('status'=>1, 'msg'=>'Created successfully');
        }else{
            $response = array('status'=>'error', 'msg'=>'Data not creacted');
        }
        
        return Response()->json($response);  
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

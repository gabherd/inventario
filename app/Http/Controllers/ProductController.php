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
        $query = 'SELECT products.id_products AS id, Measure.number AS Measure, brand.name AS Brand, model.name AS Model, Stock, Sale, Price 
                  FROM products JOIN Measure on Measure.id_measure = products.id_measure
                          JOIN model ON model.id_model = products.id_model
                          JOIN brand ON brand.id_brand = model.id_brand';

        $product = DB::select($query);
        return $product;
    }

    public function getMeasure(){
        $measure = DB::table('measure')
                    ->select('id_measure AS id', 'number')
                    ->orderBy('number')
                    ->get();

        return $measure;
    }

    public function store(ProductRequest $request)
    {
        $values = $request->validated();

        $request = DB::table('products')
                    ->insert([
                        'id_model' => $values['model'],
                        'id_measure' => $values['measure'],
                        'price' => $values['price'],
                        'stock' => $values['stock']
                    ]);

        if($request){
            $response = array('status'=>1, 'msg'=>'Created successfully');
        }else{
            $response = array('status'=>'error', 'msg'=>'Data not creacted');
        }
        
        return Response()->json($response);  
    }


    public function update(ProductRequest $request, $id)
    {
        $values = $request->validated();
    
        $request = Product::where('id_products', (int)$id)
                    ->update([
                            'id_model'     => $values['model'],
                            'id_measure'     => $values['measure'],
                            'price'     => $values['price'],
                            'stock'     => $values['stock'],
                    ]);
        
        if($request){
            $response = array('status'=>1, 'msg'=>'Created updated');
        }else{
            $response = array('status'=>0, 'msg'=> 'Data not updated');
        }

        return $response;
    }
    
    public function show($id)
    {
        $models = DB::table('products')
                    ->join('measure', 'Measure.id_measure', '=', 'products.id_measure')
                    ->join('model',   'model.id_model',     '=', 'products.id_model')
                    ->join('brand',   'brand.id_brand',     '=', 'model.id_brand')
                    ->select('products.id_products AS idProduct', 
                            'model.id_model AS idModel', 
                            'brand.id_brand AS idBrand', 
                            'Measure.id_measure AS idMeasure', 
                            'Measure.number AS Measure', 
                            'brand.name AS Brand', 
                            'model.name AS Model', 
                            'stock', 
                            'sale', 
                            'price')
                    ->where('id_products', '=', $id)
                    ->get();

        return $models;
    }

    public function destroy($id)
    {
        $query = DB::table('products')->where('id_products', $id)->delete(); 

        if($query){
            $response = array('status' => 1, 'msg'=>'Deleted');
        }else{
            $response = array('status' => 0, 'msg'=>'Data not deleted');
        }
        
        return Response()->json($response);  
    }
}

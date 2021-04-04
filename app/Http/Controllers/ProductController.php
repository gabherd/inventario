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
        $query = 'SELECT Measure.number AS Measure, brand.name AS Brand, model.name AS Model, Stock, Sale, Price 
                  FROM products JOIN Measure on Measure.id_measure = products.id_measure
                          JOIN model ON model.id_model = products.id_model
                          JOIN brand ON brand.id_brand = model.id_brand';

        $product = DB::select($query);
        return $product;
    }

    public function getModel($id){
        $model = DB::table('model')
                    ->select('id_model AS id', 'name')
                    ->where('id_brand', $id)
                    ->get(
        );
                    
        return $model;
    }

    public function getAllModels(){
        
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


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $product = DB::table('brand')
                    ->select('id_brand AS id', 'name')
                    ->orderBy('name')
                    ->get();

        return $product;
    }

    public function store(BrandRequest $request)
    {
        $values = $request->validated();

        $request = DB::table('brand')
                    ->insert(['name' => $values['nameBrand']]);

        if($request){
            $response = array('status'=>1, 'msg'=>'Created successfully');
        }else{
            $response = array('status'=>'error', 'msg'=>'Data not creacted');
        }
        
        return Response()->json($response);  
    }

    public function update(BrandRequest $request, $id)
    {
        $values = $request->validated();

        $request = DB::table('brand')->where('id_brand', (int)$id)->update(['name' => $values['nameBrand']]);
        
        if($request){
            $response = array('status'=>1, 'msg'=>'Created updated');
        }else{
            $response = array('status'=>0, 'msg'=> 'Data not updated');
        }

        return $response;
    }

    public function destroy($id)
    {

        $product = DB::table('model')
                    ->join('brand', 'model.id_brand', '=', 'brand.id_brand')
                    ->select('model.id_brand AS idBrand') 
                    ->where('model.id_brand', '=', $id)
                    ->get();

        if(count($product) == 0){
            $query = DB::table('brand')->where('id_brand', $id)->delete(); 

            if($query){
                $response = array('status' => 1, 'msg'=>'Deleted');
            }else{
                $response = array('status' => 0, 'msg'=>'Fail');
            }
        }else{
            $response = array('status' => 409, 'msg'=>'Fail, foreign key reference');
        }
        
        return Response()->json($response);  
    }
}

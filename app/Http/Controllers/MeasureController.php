<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MeasureRequest;
use App\Models\Measure;
use Illuminate\Support\Facades\DB;

class MeasureController extends Controller
{
    public function index()
    {
        $product = Measure::select('id_measure AS id', 'number')
                    ->orderBy('number')
                    ->get();

        return $product;
    }

    public function store(MeasureRequest $request)
    {
        $values = $request->validated();

        $request = Measure::insert(['number' => $values['measure']]);

        if($request){
            $response = array('status'=>1, 'msg'=>'Created successfully');
        }else{
            $response = array('status'=>0, 'msg'=>'Data not creacted');
        }
        
        return Response()->json($response);  
    }

    public function update(MeasureRequest $request, $id)
    {
        $values = $request->validated();

        $request = Measure::where('id_measure', (int)$id)->update(['number' => $values['measure']]);
        
        if($request){
            $response = array('status'=>1, 'msg'=>'Created updated');
        }else{
            $response = array('status'=>0, 'msg'=> 'Data not updated');
        }

        return $response;
    }




    public function destroy($id)
    {

        $product = DB::table('products')
                    ->join('measure', 'measure.id_measure', '=', 'products.id_measure')
                    ->select('products.id_products AS idProduct') 
                    ->where('products.id_measure', '=', $id)
                    ->get();

        if(count($product) == 0){
            $query = Measure::where('id_measure', $id)->delete(); 

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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MeasureRequest;
use App\Models\Measure;

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
        $query = Measure::where('id_measure', $id)->delete(); 

        if($query){
            $response = array('status' => 1, 'msg'=>'Deleted');
        }else{
            $response = array('status' => 0, 'msg'=>'Fail');
        }
        
        return Response()->json($response); 
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ModelRequest;

class ModelController extends Controller
{
    public function index()
    {
        $models = DB::table('model')
                    ->join('brand', 'brand.id_brand', '=', 'model.id_brand')
                    ->select('model.id_model AS idModel', 'brand.id_brand AS idBrand', 'brand.name AS brand', 'model.name AS model')
                    ->get();

        return $models;
    }

    public function store(ModelRequest $request)
    {
        $values = $request->validated();

        $request = DB::table('model')
                    ->insert(['name'     => $values['nameModel'],
                              'id_brand' => $values['id_brand']
                            ]);

        if($request){
            $response = array('status'=>1, 'msg'=>'Created successfully');
        }else{
            $response = array('status'=>0, 'msg'=>'Data not creacted');
        }
        
        return Response()->json($response);  
    }

    public function update(ModelRequest $request, $id)
    {
        $values = $request->validated();

        $request = DB::table('model')
                    ->where('id_model', (int)$id)
                    ->update(['name'     => $values['nameModel'],
                              'id_brand' => $values['id_brand']
                            ]);
        
        if($request){
            $response = array('status'=>1, 'msg'=>'Created updated');
        }else{
            $response = array('status'=>0, 'msg'=> 'Data not updated');
        }

        return $response;
    }

    public function destroy($id)
    {
        $query = DB::table('model')->where('id_model', $id)->delete(); 

        if($query){
            $response = array('status' => 1, 'msg'=>'Deleted');
        }else{
            $response = array('status' => 0, 'msg'=>'Data not deleted');
        }
        
        return Response()->json($response);  
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BrandRequest;

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
                    ->insert(['name' => $values['brand']]);

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

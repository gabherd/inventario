<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Http\Requests\UsersRequest;
use Auth;
use Validator;

//use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    
    public function index()
    {
        return view('users');
    }

    public function getUsers(){
        $users = Users::where('id', '!=',  Auth::user()->id)
                ->orWhereNull('id')
                ->orderBy('name')
                ->get();

        return $users;
    }

    public function store(UsersRequest $request)
    {
        $data = $request->validated();

        $request = Users::create($data);
    
        if($request){
            $response = array('status'=>1, 'msg'=>'Created successfully');
        }else{
            $response = array('status'=>0, 'msg'=>'Data not creacted');
        }
        
        return Response()->json($response);  
    }

    public function update(UsersRequest $request, $id){   
        
        $data = $request->validated();

        $request = Users::where('id', (int)$id)->update($data);
        
        if($request){
            $response = array('status'=>1, 'msg'=>'Created successfully');
        }else{
            $response = array('status'=>0, 'msg'=> 'Data not created');
        }

        return $response;
    }

    public function show($id)
    {
        $query = Users::select('name', 'last_name', 'email')->where("id", $id)->get();

        if($query){
            $response = array('status' => 1, 'msg'=> $query[0]);
        }else{
            $response = array('status' => 0, 'msg'=>'Fail');
        }

        return $response;
    }

    public function destroy($id)
    {
        $query = Users::where('id', $id)->delete(); 

        if($query){
            $response = array('status' => 1, 'msg'=>'Deleted');
        }else{
            $response = array('status' => 0, 'msg'=>'Fail');
        }
        
        return Response()->json($response);  
    }
}
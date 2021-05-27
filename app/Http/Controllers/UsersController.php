<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Http\Requests\UsersRequest;
use Auth;
use Validator;
use Illuminate\Support\Facades\DB;

//use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    
    public function index()
    {
        return view('users');
    }

    public function getUsers(){
        $query = "SELECT id, name, last_name, email, case isAdmin when 0 then 'No' WHEN 1 then 'Sí' end as userAccess from users where id !=".Auth::user()->id." and id_branch = ".Auth::user()->id_branch;

        return DB::select($query);
    }

    public function store(UsersRequest $request)
    {
        $data = $request->validated();

        $request = DB::table('users')
            ->insert([
                'name' => $data['name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'isAdmin' => $data['userAccess'],
                'password' => bcrypt('0123456789'),
            ]);

        if($request){
            $response = array('status'=>1, 'msg'=>'Contraseña: 0123456789');
        }else{
            $response = array('status'=>0, 'msg'=>'Data not creacted');
        }
        
        return Response()->json($response);  
    }

    public function update(UsersRequest $request, $id){   
        
        $data = $request->validated();

        $request = Users::where('id', (int)$id)->update([
                            'name' => $data['name'],
                            'last_name' => $data['last_name'],
                            'email' => $data['email'],
                            'isAdmin' => $data['userAccess'],
                        ]);
        
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

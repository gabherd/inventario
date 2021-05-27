<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use finfo;
use Hash;
use Auth;

//use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    
    public function index()
    {

        $user = User::find(5);

        // Return the image in the response with the correct MIME type
        $img = response()->make($user->avatar, 200, array(
            'Content-Type' => (new finfo(FILEINFO_MIME))->buffer($user->avatar)
        ));

        return view('account-settings', ["values" => $img]);
    }


    public function edit(Account $account)
    {
        return view('account-settings', [
            'account' => $account
        ]);
    }

    public function update(UserRequest $request, $id)
    {
        $data = $request->validated();

        $request = User::where('id', (int)$id)
                 ->update(['name'     => $data['name'],
                           'last_name' => $data['last_name']
                         ]);

        if($request){
            $response = array('status'=>1, 'msg'=>'Created successfully');
        }else{
            $response = array('status'=>0, 'msg'=> 'Data not created');
        }

        return $response;

        //$file = $request->file('user-img');
        
        ////user-name
        //// Get the contents of the file
        //$contents = $file->openFile()->fread($file->getSize());

        //// Store the contents to the database
        //$user = User::find($id);
        //$user->avatar = $contents;

        //$user->save();

        //return redirect()->route('account-settings.index');
    }

    public function changePassword(Request $request){

        $request->validate([
            'current_password'     => ['required'],
            'new_password'         => ['required', 'string', 'min:6'],
            'new_confirm_password' => ['same:new_password']
        ]);

        if(!Hash::check($request->current_password, Auth::user()->password)){
            $response = array('status'=>0, 'msg'=>'Current password not match');
            return  Response()->json($response);
        }

        if (!Hash::check($request->new_password, $request->new_confirm_password)) {
            $response = array('status'=>0, 'msg'=>'New passwods not match');
            return  Response()->json($response);
        }else{
            $user_id = Auth::User()->id;                       
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($request_data['password']);
            $obj_user->save();

            $response = array('status'=>1, 'msg'=>'Password changed');
            return  Response()->json($response);
        }
    }

    public function branchRegistered(){
        $branch = User::join('branch', 'users.id_branch', '=', 'branch.id_branch')
                                      ->where('id', '=', Auth::user()->id)
                                      ->select('branch.name')
                                      ->get();

        return $branch;
    }
}

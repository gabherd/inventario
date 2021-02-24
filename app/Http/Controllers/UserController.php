<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\ProductRequest;
use finfo;
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

    public function store(ProductRequest $request)
    {
    }

    public function edit(Account $account)
    {
        return view('account-settings', [
            'account' => $account
        ]);
    }

    public function update(Request $request, $id)
    {
        $file = $request->file('user-img');
        
        //user-name
        // Get the contents of the file
        $contents = $file->openFile()->fread($file->getSize());

        // Store the contents to the database
        $user = User::find($id);
        $user->avatar = $contents;

        $user->save();

          return redirect()->route('projects.index');
    }

    public function destroy($id)
    {
    }
}

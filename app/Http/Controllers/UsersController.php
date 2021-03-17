<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Http\Requests\ProductRequest;
//use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    
    public function index()
    {
        $users = Users::get();

        return view('users', compact('users'));
    }

    public function store(ProductRequest $request)
    {
    }

    public function edit(Account $account)
    {
      
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}

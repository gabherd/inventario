<?php

use App\Models\User;

function getBranchName(){
	    $branch = User::join('branch', 'users.id_branch', '=', 'branch.id_branch')
                                  ->where('id', '=', Auth::user()->id)
                                  ->first('branch.name');

    return $branch->name;
}


?>
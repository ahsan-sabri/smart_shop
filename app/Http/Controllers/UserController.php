<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;  // for query builder method

class UserController extends Controller {
    
    public function manageUser() {
        $users = User::paginate(10);
        return view('admin.user.manageUserContent')->with('users', $users);
    }
}

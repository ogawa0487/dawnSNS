<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    public function profile(){
        return view('users.profile');
    }
    public function search(){
        $users = DB::table('users')->get();
        // dd($users);
        return view('users.search',['users'=>$users]);
    }

}

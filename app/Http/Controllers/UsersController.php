<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function profile()
    {
        $user = DB::table('users')
            ->where('id', Auth::id())
            ->first();
        // dd($users);
        return view('users.profile',['user'=>$user]);
    }

    public function upProfile(Request $request)
    {
        $new_username = $request->input('newUsername');
        // dd($new_username);
        $new_mail = $request->input('newMail');
        $new_Pass = $request->input('newPass');
        // dd($new_Pass);
        $new_Bio = $request->input('newBio');
        $new_Icon = $request->input('newIcon');
        $new_Pass = Hash::make($new_Pass);
        DB::table('users')
            ->where('id', Auth::id())
            ->update([
                'username' => $new_username,
                'mail' => $new_mail,
                'password' => $new_Pass,
                'bio' => $new_Bio,
                'images' => $new_Icon
            ]);
        return redirect('/top');
    }


    public function search()
    {
        $users = DB::table('users')->get();
        $followings = DB::table('follows')
        ->where('follower', Auth::id())
        ->pluck('follow');
        // dd($followings);
        return view('users.search',['users'=>$users, 'followings'=>$followings]);
    }

        public function userSearch(Request $request)
    {
        $users = DB::table('users')->get();
        $followings = DB::table('follows')
        ->where('follower', Auth::id())
        ->pluck('follow');
        $userSearch = $request->input('keyword');
        // dd($userSearch);
        if (isset($userSearch)) {
            // dd('a');
            $users = DB::table('users')
                ->where('username', 'like', '%'.$userSearch.'%')
                ->orderBy('id','desc')
                ->get();
                // dd($users);
        } else {
            // dd('b');
            $users = DB::table('posts')->get();
        }
        return view('users.search',['userSearch'=>$userSearch,'users'=>$users,'followings'=>$followings]);
    }


}

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
        $new_mail = $request->input('newMail');
        $new_Pass = $request->input('newPass');

        if ($new_Pass == null) {
            $new_Pass = Auth::user()->password;
        } else {
            $new_Pass = Hash::make($request->input('newPass'));
        }

        $new_Bio = $request->input('newBio');
        $new_Icon = $request->input('newIcon');
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

    public function upload(Request $request)
    {
        // ディレクトリ名
        $dir = 'img';

        // アップロードされたファイル名を取得
        $file_name = $request->file('file')->getClientOriginalName();

        // 取得したファイル名で保存
        // storage/app/public/任意のディレクトリ名/
        $request->file('file')->storeAs('public/' . $dir, $file_name);

        $image = users();
        // dd($image);
// $任意の変数名　=　テーブルを操作するモデル名();
// storage/app/public/任意のディレクトリ名/
        $image->images = $file_name;
        $image->images = 'storage/app/public/' . $dir . '/' . $file_name;
        $image->save();

   //ページを更新する
   return redirect('/profile');
    }



}

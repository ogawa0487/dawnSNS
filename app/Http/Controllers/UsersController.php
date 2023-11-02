<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $file_name = $request->file('image');
        $data = $request->input();

        $rules = [
            'newUsername' => 'required|max:12|min:4',
            'newMail'=> 'required|email|max:12|min:4|unique:users,mail',
            'newPass' => 'required|max:12|min:4|confirmed|unique:users,password',
            'newPass_confirmation' =>'required|min:4',
        ];
        $messages = [
            'newUsername.required'=> 'ユーザーネームを入力してください。',
            'newUsername.min'=> '名前は:4文字以上で入力してください。',
            'newUsername.max' => '名前は12文字以内で入力してください',
            'newMail.required'=> 'メールアドレスを入力してください。',
            'newMail.email'=> '正しいメールアドレスを入力してください。',
            'newMail.min'=> 'アドレスは4文字以上で入力してください。',
            'newMail.max' => 'アドレスは12文字以内で入力してください。',
            'newMail.unique'=> '既に登録済みのメールアドレスです。',
            'newPass.required'=> 'パスワードを入力してください。',
            'newPass.max'=> 'パスワードは文12以内で入力してください',
            'newPass.min'=> 'パスワードは4文字以上で入力してください。',
            'newPass.unique'=> '既に登録済みのパスワードです。',
        ];
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            dd();
            return redirect('/profile')
                ->withErrors($validator)
                ->withInput();
        }


        if ($new_Pass == null) {
            $new_Pass = Auth::user()->password;
        } else {
            $new_Pass = Hash::make($request->input('newPass'));
        }

        if ($file_name == null) {
            $file_name = Auth::user()->images;
        } else {
            $data += array('image_name' => $request->file('image')->getClientOriginalName());
            $rules = [
                'image_name' => 'required|regex:/^[A-Za-z0-9\-_.]+$/',
            ];
            $messages = [
                'image_name.regex'=> '半角英数字にしてください。',
            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return redirect('/profile')
                    ->withErrors($validator)
                    ->withInput();
            }
            $rules = [
                'image' => 'image',
            ];
            $messages = [
                'image.image'=> '画像を選択してください。',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return redirect('/profile')
                    ->withErrors($validator)
                    ->withInput();
            }
            $file_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images/' , $file_name);
        }

        $new_Bio = $request->input('newBio');

        DB::table('users')
            ->where('id', Auth::id())
            ->update([
                'username' => $new_username,
                'mail' => $new_mail,
                'password' => $new_Pass,
                'bio' => $new_Bio,
                'images' =>$file_name
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

    public function OtherProfile($id)
    {
        $profile = DB::table('posts')
            ->join('users', 'posts.user_id','=','users.id')
            ->where('users.id', $id)
            ->select('posts.posts',
            'posts.created_at',
            'users.username',
            'users.images')
            ->get();
            // dd($profile);

        $icon = DB::table('users')
                ->where('id', $id)
                ->first();

        $followings = DB::table('follows')
        ->where('follower', Auth::id())
        ->pluck('follow');
        return view('users.OtherProfile',['profile'=>$profile,'icon'=>$icon,'followings'=>$followings]);
    }


}

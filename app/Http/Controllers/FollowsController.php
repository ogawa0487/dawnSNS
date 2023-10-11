<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class FollowsController extends Controller
{
    //
 public function followList()
    {
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id','=','users.id')
            ->join('follows', 'follows.follow','=','users.id')
            ->where('follower', Auth::id())
            ->get();
        return view('follows.followList',['posts'=>$posts]);
    }

     public function followerList()
    {
        // select users.username from posts join users on posts.userid = users.id;
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id','=','users.id')
            ->join('follows', 'follows.follower','=','users.id')
            ->where('follow', Auth::id())
            ->get();
    //   dd($posts);
        return view('follows.followerList',['posts'=>$posts]);
    }

    public function newfollow(Request $request)
    {
        $newfollow = $request->input('id');
                // dd($newfollow);
        DB::table('follows')->insert([
            'follow' => $newfollow,
            'follower' => Auth::id(),
            'created_at' => now()
        ]);
        return redirect('/search');
    }

    public function deletefollow(Request $request)
    {
        $id = $request->input('id');
        // dd($id);
        DB::table('follows')
            ->where([
            'follower' => Auth::id(),
            'follow' => $id,
            ])->delete();

        return redirect('/search');
    }

}

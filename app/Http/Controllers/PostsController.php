<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PostsController extends Controller
{
    //
   public function index()
    {
        // select * from posts;
        $posts = DB::table('posts')->get();
        return view('posts.index',['posts'=>$posts]);
    }

    public function createForm()
    {
        return view('posts.createForm');
    }
}

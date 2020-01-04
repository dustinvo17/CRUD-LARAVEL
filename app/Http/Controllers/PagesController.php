<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PagesController extends Controller
{
    //
    public function service() {
        return view('pages.service');
    }

    public function about() {
        return view('pages.about');
    }
    public function home(){
         $posts = Post::all()->reverse();
        return view('welcome',['posts' => $posts]);
    }
}

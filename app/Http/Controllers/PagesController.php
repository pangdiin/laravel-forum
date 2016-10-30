<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class PagesController extends Controller
{
    public function home()
    {
    	$posts = Post::orderBy('id','desc')->paginate(5);
    	return view('pages.home',compact('posts'));
    }

}


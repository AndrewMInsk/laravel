<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct()
    {
     //   $this->middleware('auth');
    }
public function index(){
    $posts = Post::all();
    return view('index', compact('posts'));

}

}

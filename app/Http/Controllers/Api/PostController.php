<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){
        
        // solo i pubblicati
        $posts = Post::where("published", true)->with(["category", "tags"])->get();

        return response()->json($posts);
    }
}

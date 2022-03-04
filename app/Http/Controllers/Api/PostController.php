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

    public function show($slug){
        
        $post = Post::where("slug", $slug)->with(["category", "tags"])->first();

        if(empty($post)) {
            return response()->json(["message" => 'Post Not Found'], 404);
        }
        
        return response()->json($post);
    }
}


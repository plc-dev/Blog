<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function getArchive(){
        $post = Post::all();

        return view('blog.archive')->with('post', $post);
    }

    public function getSingle($slug){
        //fetch from the DB based on the slug var
        $post = Post::where('slug', '=', $slug)->first();

        //return the view and pass in the post object
        return view('blog.single')->with('post', $post);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request){
        
        $post = Post::where('title', 'like', '%' . request('search') . '%')->paginate(20)->withQueryString();

        if($request->ajax()){
            
            return view('scroll',['posts'=>$post]); 
        } 

        return view('posts');
    }
}

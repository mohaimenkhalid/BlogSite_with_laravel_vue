<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class blogController extends Controller
{
    public function get_all_blog_post()
    {
    	$blogposts = Post::with('user', 'category')->orderBy('id', 'DESC')->get();
        return response()->json([
            'blogposts' => $blogposts
        ], 200);
    }


    public function get_post_by_id($id)
    {
    	$blogpost = Post::with('user', 'category')->where('id', $id)->orderBy('id', 'DESC')->first();
        return response()->json([
            'blogpost' => $blogpost
        ], 200);
    	
    }

    public function categories()
    {
        $allcategories = Category::all();
        return response()->json([
            'allcategories' => $allcategories
        ], 200);
    }

    public function categorypost($id)
    {
        $categoryposts = Post::with('user', 'category')->where('category_id', $id)->orderBy('id', 'DESC')->get();
        return response()->json([
            'categoryposts' => $categoryposts
        ], 200);
        
    }

    public function searchpost()
    {
        $search = \Request::get('query');
        $posts = Post::with('user', 'category')
        ->where('title', 'LIKE', "%$search%")
        ->orWhere('description', 'LIKE', "%$search%")
        ->orderBy('id', 'DESC')
        ->get();
        return response()->json([
            'posts' => $posts
        ], 200);
    }
}

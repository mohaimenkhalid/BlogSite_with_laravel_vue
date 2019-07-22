<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use Image;

class PostController extends Controller
{

    

    public function all_post()
    {
        $posts = Post::with('user', 'category')->orderBy('id', 'DESC')->get();
        return response()->json([
            'posts' => $posts
        ], 200);

    }


    public function savepost(Request $request)
    {
    	$this->validate($request, [
            'title' => 'required|min:2|max:50',
            'description' => 'required',
            'category_id' => 'required',

        ]);

    	$strpos = strpos($request->photo, ';'); //get string position
    	$sub = substr($request->photo, 0, $strpos); // cut string 0 to ';' position
    	$ex = explode('/', $sub)[1]; //explode from '/'
    	$name = time().'.'.$ex; //time() gives a name and ex get a extension and then join here
    	$location = public_path('/uploadimage/'.$name);  // which location we want to save
    	$img = Image::make($request->photo); //make image
    	$img->save($location); //save to location

    	$post = new Post();
    	$post->title = $request->title;
    	$post->description = $request->description;
    	$post->category_id = $request->category_id;
    	$post->user_id = Auth::user()->id;
    	$post->photo = $name;
    	$post->save();
    }


    public function delete_post($id)
    {
    	$post = Post::find($id);
    	$image_path = public_path('uploadimage/'. $post->photo);
    	if (file_exists($image_path)) {
    		@unlink($image_path);
    	}
    	$post->delete();

    }

    public function edit_post($id)
    {
        $post = Post::find($id);

        return response()->json([
            'post' => $post
        ], 200);
    }

    public function update_post(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required|min:2|max:50',
            'description' => 'required',
            'category_id' => 'required',

        ]);

        $post = Post::find($id);
        

        if ($request->photo != $post->photo) {

            
            $strpos = strpos($request->photo, ';'); //get string position
            $sub = substr($request->photo, 0, $strpos); // cut string 0 to ';' position
            $ex = explode('/', $sub)[1]; //explode from '/'
            $name = time().'.'.$ex; //time() gives a name and ex get a extension and then join here
            $location = public_path('/uploadimage/'.$name);  // which location we want to save
            $img = Image::make($request->photo); //make image
            $img->save($location); //save to location

            $image_path = public_path('uploadimage/'. $post->photo);
                if (file_exists($image_path)) {
                      @unlink($image_path);
                }
           
        }else{
            $name = $post->photo;
        }

       
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->user_id = Auth::user()->id;
        $post->photo = $name;
        $post->save();

        
    }

}

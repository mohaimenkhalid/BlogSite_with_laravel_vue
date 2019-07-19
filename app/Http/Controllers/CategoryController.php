<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function add_category(Request $request)
    {
    	$this->validate($request, [
            'category_name' => 'required|min:2|max:50',
        ]);

    	 $category = new Category;
    	 $category->name = $request->category_name;
    	 $category->save();

    	 return ['message'=> 'Ok'];
    }


    public function all_category()
    {
        $categories = Category::all();
        return response()->json([
            'categories' => $categories
        ], 200);

    }
}

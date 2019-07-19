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

    public function delete_category($id)
    {
        $category = Category::find($id);
        $category->delete();
    }

    public function edit_category($id)
    {
        $category = Category::find($id);
        $category = $category->name;

        return response()->json([
            'category' => $category
        ], 200);
    }

    public function update_category(Request $request, $id)
    {
        $this->validate($request, [
            'category_name' => 'required|min:2|max:50',
        ]);
        
        $category = Category::find($id);
        $category->name = $request->category_name;
        $category->save();
        
    }
}
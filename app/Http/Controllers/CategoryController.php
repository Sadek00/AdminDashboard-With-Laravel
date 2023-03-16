<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Str;

class CategoryController extends Controller
{
    public function addcategory()
    {
        return view('backend.category.category_form');
    }

    public function postcategory(Request $request){

        // return $request->all(); 
        // return "OK";

        $category = new Category;
        $category->category_name = $request->category_name;
        $category->slug = str::slug($request->category_name);
        $category->save();

        return redirect('/view-category');
    }
    public function viewcategory()
    {
        $category = Category::all();
        return view('backend.category.category_view',compact('category'));
    }
}

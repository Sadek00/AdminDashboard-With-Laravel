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

        $request->validate([
            'category_name' => 'required|unique:categories|min:3|max:255',
            'slug' => 'required|unique:categories',
        ],[
            'category_name.required'=> 'Okii Bro! kichu ekta dao',
        ]);

        $category = new Category;
        $category->category_name = $request->category_name;
        $category->slug = str::slug($request->category_name);
        $category->save();

        return redirect('/view-category')->with('success','Successfully Add Category Data');
    } 
    public function viewcategory()
    {
        // $category = Category::all(); for fetch all data
        // $category = Category::latest()->get(); for fetch the latest data
        $category = Category::OrderBy('category_name','asc')->paginate(5);
        return view('backend.category.category_view',compact('category'));
    }
    public function deletecategory($data)
    {
        Category::findOrFail($data)->delete();

        return redirect('/view-category')->with('success','Category Deleted Successfully');
    }
    public function editcategory($value)
    {
        return view('backend.category.category_edit',['category' => Category::findOrFail($value),]);
    }
    public function updatecategory(Request $request)
    {
        //Validation
        $request->validate([
            'category_name' => 'required|min:3|max:255',
            'slug' => 'required',
        ],[
            'category_name.required'=> 'Okii Bro! kichu ekta dao',
        ]);

        $category = Category::findOrFail($request->id); 
        $category->category_name = $request->category_name;
        $category->slug = str::slug($request->category_name);
        $category->save();
        return redirect('/view-category')->with('success','Category Updated Successfully');
        
    }
    public function trashedcategory()
    {
        $category = Category::onlyTrashed()->OrderBy('category_name','asc')->paginate(5);
        return view('backend.category.trashed',compact('category'));
    }
    public function RestoreCategory($value)
    {
        Category::onlyTrashed()->findOrFail($value)->restore();
        return back()->with('success','Successfully Restore The Category Data');
    }
    public function PermanentdeleteCategory($value)
    {
        Category::onlyTrashed()->findOrFail($value)->forceDelete();
        return back()->with('success','Permanently Deleleted The Data');
    }

}

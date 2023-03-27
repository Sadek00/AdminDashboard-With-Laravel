<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use Str;

class SubcategoryController extends Controller
{
    public function ViewCategory()
    {
        $subcategory = Subcategory::OrderBy('subcategory_name','asc')->paginate(5);
        return view('backend.subcategory.subcategory_view',compact('subcategory'));
    }
    public function AddSubcategory()
    {
       return view('backend.subcategory.subcategory_form',['categories'=> Category::OrderBy('category_name','asc')->get()]);
    }
    public function PostSubcategory(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories|min:3|max:255',
            'slug' => 'required|unique:subcategories',
        ],[
            'subcategory_name.required'=> 'Okii Bro! kichu ekta dao',
        ]);

        $category = new Subcategory;
        $category->subcategory_name = $request->subcategory_name;
        $category->slug = str::slug($request->slug);
        $category->category_id = $request->category_id;
        $category->save();

        return redirect('/view-subcategory');
    }
    public function AllDeleteSubcategory(Request $request)
    {
        foreach ($request->delete as $key => $delete) {
            Subcategory::findOrFail($delete)->delete();
        }
        return back($status = 302, $headers = [], $fallback = false)->with('success','Category Deleted Successfully');
    }
    public function TrashedSubcategory()
    {
        $category = Subcategory::onlyTrashed()->OrderBy('subcategory_name','asc')->paginate(5);
        return view('backend.subcategory.trashed',compact('category'));
    }
}

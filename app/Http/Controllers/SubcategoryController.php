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
        $subcategory = Subcategory::OrderBy('category_name','asc')->paginate(5);
        return view('backend.subcategory.subcategory_view',compact('subcategory'));
    }
    public function AddSubcategory()
    {
       return view('backend.subcategory.subcategory_form',['categories'=> Category::OrderBy('category_name','asc')->get()]);
    }
}

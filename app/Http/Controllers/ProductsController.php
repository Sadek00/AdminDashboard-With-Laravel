<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Str;
use Image;


class ProductsController extends Controller
{
    public function ProductsView()
    {
        $products = Product::OrderBy('title','asc')->paginate(5);
        return view('backend.product.product_view',compact('products'));
    }

    public function AddProducts()
    {
        return view('backend.product.product_add',['categories'=> Category::OrderBy('category_name','asc')->get()]);
    }
    public function PostProducts(Request $request)
    {
        $request->validate([
            'thumbnail' => 'required|image',
            'slug' => 'required|unique:products',
        ]);
        $product = new Product;
        $product->title = $request->title;
        $product->slug = $request->slug;
        $product->category_id = $request->category_id;
        $product->subcategory_id = 1;
        $slug = $request->slug;
        //Str::slug($request->slug, '-');

        if ($request->hasFile('thumbnail')) {
             $image = $request->file('thumbnail');
             $ext = Str::random(3).'-'.$slug.'.'.$image->getClientOriginalExtension();
             Image::make($image)->save(public_path('thumbnail/'.$ext));

             $product->thumbnail = $ext;
         }
         $product->save();
         return back();

    }
}

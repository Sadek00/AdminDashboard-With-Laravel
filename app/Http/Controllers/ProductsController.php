<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Str;


class ProductsController extends Controller
{
    public function ProductsView()
    {
        $products = Product::OrderBy('title','asc')->paginate(5);
        return view('backend.product.product_view',compact('products'));
    }

    public function AddProducts()
    {
        return view('backend.product.product_add');
    }
}

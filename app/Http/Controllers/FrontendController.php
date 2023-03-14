<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function about(){

        // $var = 'Hello';
        // return view('pages.about',compact('var'));
        return view('pages.about',['var'=>'Hi']);
    }
}

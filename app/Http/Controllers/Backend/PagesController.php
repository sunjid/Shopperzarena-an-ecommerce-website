<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\ProductImage;



use Image;

class PagesController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth:admin');
    }
    public function products()
    {
        $products = Product::orderby('id','desc')->get();
        return view("backend.pages.product.index")->with('products',$products);
    }
    public function index()
    {
    	return view("backend.pages.index");
    }

}

<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;

class ProductsController extends Controller
{
  public function index()
  {
    $products = Product::orderby('id','desc')->paginate(6);
    return view("frontend.pages.product.index")->with('products',$products);
  }
  public function show($slug)
  {
    $products = Product::where('slug',$slug)->first();
    if (!is_null($products)) {
      // code...
      return view("frontend.pages.product.show",compact('products'));
    }
    else {
      // code...
      session()->flash('error', 'There is no product by this URL !!');
      return redirect('products');
    }

  }
}

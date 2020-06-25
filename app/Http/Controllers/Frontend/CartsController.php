<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Cart;
use App\Models\Order;

use Auth;

class CartsController extends Controller
{
    //
    public function index()
    {
        return view('frontend.pages.carts');
    }

    public function store(Request $request)
    {
    	$this->validate($request,[

    		'product_id' => 'required',
    	],
    	[
    		'product_id.required' => 'Please Give A Product Id',
    	]);

        if (Auth::check()) {

            $cart = Cart::where('user_id',Auth::id())
                 ->where('product_id',$request->product_id)
                 ->first();
        }
        else
        {
             $cart = Cart::where('ip_address',Auth::id())
                 ->where('product_id',$request->product_id)
                 ->first();
        }

        if (!is_null($cart)) {
              $cart->increment('product_quantity');
            }
            else
            {
                $cart = new Cart();

                if(Auth::check())
                {
                    $cart->user_id = Auth::id();
                }
                $cart->ip_address = request()->ip();
                $cart->product_id = $request->product_id;
                $cart->save();
                }

    	       session()->flash('success','Product Has Added To Cart !!');
                return back();
    }

    public function update(Request $request, $id)
    {

        $cart = Cart::find($id);

        if (!is_null($cart)) {
            $cart->product_quantity = $request->product_quantity;
            $cart->save();
        }else{
            return ridirect()->route('carts');
        }

        session()->flash('success','Cart item Has Updated Successfully');
        return back();
    }
    public function destroy($id)
    {

        $cart = Cart::find($id);

        if (!is_null($cart)) {

            $cart->delete();
        }else{
            return ridirect()->route('carts');
        }

        session()->flash('success','Cart item Has Deleted Successfully');
        return back();
    }

}

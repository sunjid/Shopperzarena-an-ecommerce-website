<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Cart extends Model
{
    public $fillable =[

    	'user_id',
    	'product_id',
    	'product_quantity',
    	'shipping_address',
    	'order_id',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function order()
    {
    	return $this->belongsTo(Order::class);
    }

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

    /**
     * Total item in the Cart
     *@return integer totalItem
     */
    public static function  totalCarts()
    {
        if(Auth::check())
        {
            $carts = Cart::orWhere('user_id', Auth::id())
                 ->orWhere('order_id', NULL)
                 ->get();
        }
        else
        {
             $carts = Cart::orWhere('ip_address',request()->ip())->orWhere('order_id', NULL)->get();
        }

        return $carts;
    }


    /**
     * Total item in the Cart
     *@return integer totalItem
     */
    public static function  totalItems()
    {
        if(Auth::check())
        {
            $carts = Cart::orWhere('user_id',Auth::id())
                 ->orWhere('ip_address',request()->ip())
                 ->get();
        }
        else
        {
             $carts = Cart::orWhere('ip_address',request()->ip())->get();
        }

        $total_item = 0;

        foreach ($carts as $cart) {
        $total_item += $cart->product_quantity;
        }
        return $total_item;
    }

}

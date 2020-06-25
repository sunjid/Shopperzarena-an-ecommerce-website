@extends('frontend.layouts.master')
@section('content')
<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="{{route('index')}}">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="{{route('carts')}}">Cart</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- End Breadcrumbs -->
<!-- Shopping Cart -->
@if(App\Models\Cart::totalItems() > 0)
<div class="shopping-cart section">
    <div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Shopping Summery -->
				<table class="table shopping-summery">
					<thead>
						<tr class="main-hading">
						    
							<th>PRODUCT</th>
							<th>NAME</th>
							<th class="text-center">UNIT PRICE</th>
							<th class="text-center">QUANTITY</th>
							<th class="text-center">SUB TOTAL</th> 
							<th class="text-center"><i class="ti-trash remove-icon"></i></th>
						</tr>
					</thead>
					<tbody>
						@php
							$total_price = 0
						@endphp
						@foreach (App\Models\Cart::totalCarts() as $cart)
						<tr>
                            
								@if($cart->product->images->count() > 0)
								<td class="image" data-title="Product Image"><img src="{{ asset('images/products/'.$cart->product->images->first()->image)}}" ></td>
								@endif
								<td class="product-des" data-title="Product Image">
									<p class="product-name"><a href="{{route('products.show', $cart->product->slug)}}">{{ $cart->product->title}} </a></p>
								</td>
								<td class="price" data-title="Price"><span>{{ $cart->product->price }}</span></td>

								<td class="qty" data-title="Qty"><!-- Input Order -->
									<form class="form-inline" action="{{route('carts.update', $cart->id) }}" method="post">
									@csrf
									<input type="number" name="product_quantity" class="form-control" value="{{ $cart->product_quantity}}">
									<button type="submit" class=" btn-custom">Update</button>
									</form>
									<!--/ End Input Order -->
								</td>
								<td class="total-amount" data-title="Sub Total"><span>
									@php
										$total_price +=  $cart->product->price * $cart->product_quantity
									@endphp
									{{ $cart->product->price * $cart->product_quantity }}
								</span></td>
								<td class="action" data-title="Remove"><a href="#"><i class="ti-trash remove-icon"></i></a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
					
					<!--/ End Shopping Summery -->
				</div>
			</div>
			
			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-12">
								
							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
								<ul>
										<li>Cart Subtotal<span>{{ $total_price }}</span></li>
										<li>Shipping Cost<span>{{App\Models\Setting::first()->shipping_cost}}</span></li>
										<li class="last">You Pay<span>{{$total_price + App\Models\Setting::first()->shipping_cost}}</span></li>
									</ul>
									<div class="button5">
										<a href="{{ route('checkouts') }}" class="btn">Checkout</a>
										<a href="#" class="btn">Continue shopping</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
			@else
			<div class="alert alert-warning">
					<strong> There is no item in your cart. </strong>
					<br>
					<a href="{{ route('products') }}" class="btn ">Continue Shopping..</a>
				</div>
			@endif	
	 </div>
 </div>	
<!--/ End Shopping Cart -->

@endsection

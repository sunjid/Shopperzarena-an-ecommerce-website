@extends('frontend.layouts.master')
@section('content')
<section class="shop checkout section">
<div class="container ">	
	<div class="card card-body">
		<h2>Checkout Items</h2>
		<hr>
		@php
			$total_price = 0;
		@endphp
		@foreach(App\Models\Cart::totalCarts() as $cart)
		<div class="row">
			<div class="col-md-7">
			<p> 
				{{$cart->product->title}} - 
				<strong> &#2547; {{ $cart->product->price }} </strong>
				- {{$cart->product_quantity}} item
			</p>
			</div>
			<div class="col-md-5">
				@php
				    $total_price += $cart->product->price * $cart->product_quantity;
				@endphp
				<p>Total Price : &#2547; {{$total_price}}</p>
				<p>Total Price with Shipping Cost : <strong> &#2547; {{$total_price + App\Models\Setting::first()->shipping_cost}}  </strong></p>
			</div>
		</div>
		@endforeach
		<br>	
		<h6>
			<a href="{{route('carts')}}"> Change Cart Item </a>
		</h6>
		</div>

		<div class="card card-body mt-2 mb-4">
			<h2>Shipping Address</h2>
			<hr>
			<form class="form" method="POST" action="{{ route('checkouts.store') }}">
            @csrf
			<div class="row">
			<div class="col-lg-12 col-md-6 col-12">
            <div class="form-group ">
                <label for="name" >{{ __('Reciever Name') }} <span>*</span></label>
                    <input id="name" type="text" class="{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::check() ?  Auth::user()->first_name.''.Auth::user()->last_name : '' }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
			<div class="col-lg-12 col-md-6 col-12">
            <div class="form-group ">
                <label for="email" >{{ __('E-Mail Address') }}<span>*</span></label>
                    <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::check() ?  Auth::user()->email : '' }} " required>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
			<div class="col-lg-12 col-md-6 col-12">
            <div class="form-group ">
                <label for="phone_no">{{ __('Phone Number') }}<span>*</span></label>
               
                    <input id="phone_no" type="text" class="{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{ Auth::check() ?  Auth::user()->phone_no : '' }}" required>

                    @if ($errors->has('phone_no'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone_no') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            
           <div class="col-lg-12 col-md-6 col-12">
			<div class="form-group ">
                <label for="message" >{{ __('Additional Message (Optional)') }}</label>
                    <textarea id="message" type="text" class="{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message"></textarea>

                    @if ($errors->has('shipping_address'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('shipping_address') }} </strong>
                        </span>
                    @endif
                </div>
            </div>
			<div class="col-lg-12 col-md-6 col-12">
            <div class="form-group ">
                <label for="Shipping_address">{{ __('Shipping Address') }}</label>
                
                    <textarea id="shipping_address" type="text" class="{{ $errors->has('shipping_address') ? ' is-invalid' : '' }}" name="shipping_address"> {{ Auth::check() ?  Auth::user()->shipping_address : '' }} </textarea>
                    @if ($errors->has('shipping_address'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('shipping_address') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
			<div class="col-lg-12 col-md-6 col-12">
            <div class="form-group ">
                <label for="payment_method" >Select A Payment Method</label>
                
                    <select class="form-control" name="payment_method_id" required id="payments">
                    	<option value="">Please Select A Payment Method Please</option>
                    	@foreach($payments as $payment)
                    		<option value="{{ $payment->short_name}}">{{$payment->name}}</option>
                    	@endforeach
                    </select>
                    @foreach($payments as $payment)   
                            @if($payment->short_name == "cash in")
                                <div id="payment_{{$payment->short_name}}" class="alert alert-success text-center hidden">
                                    <h3>
                                        For Cash in there is nothing necessary.Just click Finish Order.
                                        <br>
                                        <small>
                                            You will get your Product in two or three business days.
                                        </small>
                                    </h3>
                                </div>
                                @else
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="payment_{{$payment->short_name}}" class="alert alert-success text-center hidden">
                                    <h3>{{$payment->name}} Payment</h3>
                                    <p>
                                      <strong>{{$payment->name}} No: {{$payment->no}}</strong>
                                      <br>
                                      <strong>Account Type: {{$payment->type}}  </strong>     
                                    </p>
                                    <div class="alert alert-success">
                                        Please Send the above money to this Bkash No and write your transection code below there.
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            @endif
                        
                    @endforeach
                    <input type="text" name="transaction_id" id="transaction_id" class="form-control hidden"placeholder="Enter a transaction code">
					<br>	
					<div class="col-lg-12 col-md-6 col-12">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Order Now') }}
                        </button>
                    </div>
                
                    </div>
                </div>
                
				</div>
                </form>
            </div>      
        
		</div>
</section>	
@endsection

@section('scripts')
  <script type="text/javascript">
      $("#payments").change(function(){

        $payment_method = $("#payments").val();
       //alert($payment_method);

        if ($payment_method == 'cash_in') {

            $("#payment_cash_in").removeClass('hidden');
            $("#payment_bkash").addClass('hidden');
            $("#payment_rocket").addClass('hidden');

        }
        else if ($payment_method == 'bkash'){

            $("#payment_bkash").removeClass('hidden');
             $("#payment_cash_in").addClass('hidden');
            $("#payment_rocket").addClass('hidden');
            $("#transaction_id").removeClass('hidden');
        }
        else if ($payment_method == 'rocket'){

            $("#payment_rocket").removeClass('hidden');
             $("#payment_cash_in").addClass('hidden');
            $("#payment_bkash").addClass('hidden');
            $("#transaction_id").removeClass('hidden');
        }
        
      })
  </script>     
@endsection
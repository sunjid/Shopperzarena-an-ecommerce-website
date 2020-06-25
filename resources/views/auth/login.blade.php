@extends('frontend.layouts.master')

@section('content')
<!-- Start Login -->
<section class="shop checkout section">
			<div class="container">
				<div class="row"> 
					<div class="col-lg-8 col-12">
						<div class="checkout-form">
							<h2>Login</h2>
							<hr>
							<!-- Form -->
						<form class="form" method="POST" action="{{ route('login') }}">
							@csrf
							<div class="row">
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
									<label>First Name<span>*</span></label>
									<input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
									@if ($errors->has('email'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
								</div>
							 </div>
							<div class="col-lg-6 col-md-6 col-12">
							   <div class="form-group">
								<label >{{ __('Password') }}<span>*</span></label>						
									<input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
									@if ($errors->has('password'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
									@endif
								</div>
							</div>						
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
								<button type="submit" class="btn">
									{{ __('Login') }}
								</button>
								@if (Route::has('password.request'))
									<a class="btn-custom" href="{{ route('password.request') }}">
										{{ __('Forgot Your Password?') }}
									</a>
								@endif
								</div>
							</div>
                    </form>
                <div>
             </div>
        </div>
    </div>
</section>
<!--/ End Login -->


@endsection

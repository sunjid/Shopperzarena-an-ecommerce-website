@extends('frontend.layouts.master')
@section('content')
<section class="shop checkout section">
	<div class="container">
		<div class="row"> 
		    <div class="col-lg-8 col-12">
				<div class="checkout-form">
				<h2>Reset Password</h2>
				<hr>
                 <form  class="form" method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="row">
                        <div class="col-lg-12 col-md-6 col-12">
							<div class="form-group">
                            <label>{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						<div class="col-lg-12 col-md-6 col-12">
                        <div class="form-group">
                            <label>{{ __('Password') }}</label>
                                <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						<div class="col-lg-12 col-md-6 col-12">
                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            
                                <input id="password-confirm" type="password" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-6 col-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
					</div>	
                </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

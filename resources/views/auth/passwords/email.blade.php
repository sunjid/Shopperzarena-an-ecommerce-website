@extends('frontend.layouts.master')

@section('content')
<section class="shop checkout section">
	<div class="container">
		<div class="row"> 
		    <div class="col-lg-8 col-12">
				<div class="checkout-form">
				<h2>Reset Password</h2>
				<hr>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
					    {{ session('status') }}
                    </div>
                @endif
                <form class="form" method="POST" action="{{ route('password.email') }}">
                @csrf
					<div class="row">
                        <div class="col-lg-12 col-md-6 col-12">
							<div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                 </span>
                            @endif
                            </div>
							<button type="submit" class="btn ">
                                    {{ __('Send Password Reset Link') }}
                            </button>
						</div>
					</div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
@endsection

@extends('frontend.pages.users.master')
@section('sub-content')
<section class="shop checkout section">
<div class="container">
	<div class="row"> 
			<div class="col-lg-12 col-12">
				<div class="checkout-form">
					<h2>Update Profile</h2>	
								<hr>	
								<form class="form" method="POST" action="{{ route('user.profile.update') }}">
								@csrf
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
										<label>{{ __('First Name') }}</label>
										<input id="first_name" type="text" class="{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ $user->first_name }}" required autofocus>
										@if ($errors->has('first_name'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('first_name') }}</strong>
										</span>
										@endif
									</div>
								</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="last_name" >{{ __('Last Name') }}</label>          
									<input id="last_name" type="text" class="{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ $user->last_name }}"  required autofocus>
									@if ($errors->has('last_name'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('last_name') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="username">{{ __('Username') }}</label>                
									<input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $user->username }}"  required autofocus>
									@if ($errors->has('username'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('username') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group ">
									<label for="email">{{ __('E-Mail Address') }}</label>
									<input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value=" {{ $user->email }} " required>
									@if ($errors->has('email'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="phone_no">{{ __('Phone Number') }}</label>
									<input id="phone_no" type="text" class="{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{ $user->phone_no }}" required>
									@if ($errors->has('phone_no'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('phone_no') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group ">
								<label for="division_id">{{ __('Division Name') }}</label>
								<select class="form-control" name="division_id">
									<option value="">Please Select Your Division</option>
									@foreach($divisions as $division)
										<option value="{{ $division->id }}" {{ $user->division_id == $division->id ? 'selected' : '' }}>{{$division->name}}</option>
									@endforeach
								</select>
								</div>
							</div>					
							<div class="col-md-6">
								<div class="form-group">
								<label for="district_id">{{ __('District Name') }}</label>               
								<select class="form-control" name="district_id">
									<option value="">Please Select Your District</option>
									@foreach($districts as $district)
									<option value="{{$district->id}}"{{ $user->district_id == $district->id ? 'selected' : '' }}>{{$district->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
							<label for="street_address">{{ __('Street Address') }}</label>                
							<input id="street_address" type="text" class="{{ $errors->has('street_address') ? ' is-invalid' : '' }}" name="street_address" value="{{ $user->street_address }}" required>
							@if ($errors->has('street_address'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('street_address') }}</strong>
							</span>
							@endif
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
							<label for="shipping_address">{{ __('Street Address') }}</label>
							<textarea id="shipping_address" type="text" class="{{ $errors->has('shipping_address') ? ' is-invalid' : '' }}" name="shipping_address"> {{ $user->shipping_address }} </textarea>
							@if ($errors->has('shipping_address'))
							<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('shipping_address') }}</strong>
							</span>
							@endif
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
							<label for="password">{{ __('New Password (Optional)') }}</label>			   
							<input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
							@if ($errors->has('password'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
							@endif
							</div>
							<button type="submit" class="btn btn-primary">
								{{ __('Update Profile') }}
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

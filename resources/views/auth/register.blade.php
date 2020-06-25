@extends('frontend.layouts.master')

@section('content')


<section class="shop checkout section">
			<div class="container">
				<div class="row"> 
					<div class="col-lg-8 col-12">
						<div class="checkout-form">
							<h2>Register an Account</h2>
							<hr>
							<!-- Form -->
							<form class="form" method="post" action="{{ route('register') }}">
							@csrf
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>First Name<span>*</span></label>
											<input id="first_name" type="text" class="{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                            @if ($errors->has('first_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                            @endif
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Last Name<span>*</span></label>
											<input id="last_name" type="text" class="{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                            @if ($errors->has('last_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                </span>
                                            @endif
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Email Address<span>*</span></label>
											<input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Phone Number<span>*</span></label>
											<input id="phone_no" type="phone_no" class="{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{ old('phone_no') }}" required>

                                            @if ($errors->has('phone_no'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone_no') }}</strong>
                                                </span>
                                            @endif
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>State / Divition<span>*</span></label>
											<select  name="division_id" id="division_id">>
											<option value="">Please Select Your Division</option>
												@foreach($divisions as $division)
                                                  <option value="{{ $division->id }}">{{$division->name}}</option>
                                                @endforeach
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>District<span>*</span></label>
											<select  name="district_id" id="district_area">>
												@foreach($districts as $districts)
                                                  <option value="{{ $districts->id }}">{{$districts->name}}</option>
                                                @endforeach
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Street Address<span>*</span></label>
											<input id="street_address" type="street_address" class="{{ $errors->has('street_address') ? ' is-invalid' : '' }}" name="street_address" value="{{ old('street_address') }}" required>

                                            @if ($errors->has('street_address'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('street_address') }}</strong>
                                                </span>
                                            @endif
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Password<span>*</span></label>
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
											<label>Confirm Password<span>*</span></label>
											<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
										</div>
									</div>
									
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
										</div>
									</div>

								</div>
							</form>
							<!--/ End Form -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Checkout -->
@endsection

@section('scripts')
  <script src="{{ asset('js/jquery-3.4.1.min.js')}}">
  </script>
  <script>
    $("#division_id").change(function(){
      var division = $("#division_id").val();
      //alert(division);
      //send an ajax request to  server with this division
      $("#district_area").html("");
      var option = "";
      var url = "{{ url('/') }}";
      $.get( url+"/get-districts/"+division, function( data ) {
        data = JSON.parse(data);
        //console.log(data);
        data.forEach(function(element){
          //console.log(element.name);
          option += "<option value='"+element.id+"'>"+element.name+"</option>";
        });
        $("#district_area").html(option);
});
    })
  </script>
@endsection
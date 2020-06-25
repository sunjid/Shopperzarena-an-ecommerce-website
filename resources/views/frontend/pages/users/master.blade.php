@extends('frontend.layouts.master')
@section('content')
  <!--Start Sidebar + Content -->
  <section class="shop-services section home">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="list-group">
          <ul>
            <a href="" class="list-group-item">
                  <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="img rounded-circle" style="width:80px"> 
              </a>
			  
            </a>
            <a href="{!! route('user.dashboard') !!}" class="list-group-item {!! Route::is('user.dashboard') ? 'active' : ''!!}">Dashboard</a>
            <a href="{!! route('user.profile') !!}" class="list-group-item {!! Route::is('user.profile') ? 'active' : ''!!}">Update Profile</a>
            <a href="{{ route('logout') }}" class="list-group-item" onclick="event.preventDefault(); 
				document.getElementById('logout-form').submit();"> {{ __('Logout') }}
			</a>										
			<form id="logout-form"   action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
          </ul>
        </div>
			
      </div>
      <div class="col md-8">
        <div class="card card-body">
          @yield('sub-content')
        </div>
      </div>
    </div>
  </div>
  </section>
@endsection

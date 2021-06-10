<!-- Header -->
	<header class="header shop">
		<!-- Topbar -->
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-12 col-12">
						<!-- Top Left -->
						<div class="top-left">
							<ul class="list-main">
								<li><i class="ti-headphone-alt"></i> +060 (800) 801-582</li>
								<li><i class="ti-email"></i> support@shopazn.com</li>
							</ul>
						</div>
						<!--/ End Top Left -->
					</div>
					
					<div class="col-lg-7 col-md-12 col-12">
						<!-- Top Right -->
						<div class="right-content">
							<ul class="list-main">
								@guest
										<li><i class="ti-user"></i>
												<a href="{{ route('login') }}">
													Login
												</a>
										</li>
										@if (Route::has('register')) 
								        <li><i class="ti-power-off"></i><a href="{{ route('register') }}">Register</a>
												</li>
										@endif
								        @else
										<li class="nav-item dropdown">
												<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
														<img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="img rounded-circle" style="width:40px">
														{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}<span class="caret"></span>
												</a>
												<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
													<a class="dropdown-item" href="{{ route('user.dashboard') }}">
															{{ __('My Dashboard') }}
													</a>
														<a class="dropdown-item" href="{{ route('logout') }}"
															 onclick="event.preventDefault();
												                document.getElementById('logout-form').submit();">
																{{ __('Logout') }}
														</a>


														<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
																@csrf
														</form>
												</div>
										</li>
								@endguest
							</ul>
						</div>
						<!-- End Top Right -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Topbar -->
		
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<a href="{{ route('index') }}">
							<img src="{{ asset('images/logo-new.png') }}" alt="logo"></a>
						</div>
						<!--/ End Logo -->
						<!-- Search Form -->
						<div class="search-top">
							<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
							<!-- Search Form -->
							<div class="search-top">
								<form action="{{ route('search')}}" class="search-form" >
									<input type="text" placeholder="Search here..." name="search">
									<button value="search" type="submit"><i class="ti-search"></i></button>
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
						<!--/ End Search Form -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-md-7 col-12">
						<div class="search-bar-top">
							<div class="search-bar">

								<form action="{{ route('search')}}" method="get">
									<input name="search" placeholder="Search Products Here....." type="search">
									<button class="btnn"><i class="ti-search"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-3 col-12">
						<div class="right-bar">
							<!-- Search Form -->
							<div class="sinlge-bar">
								<a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
							</div>
							
							@if(App\Models\Cart::totalItems() > 0)
							<div class="sinlge-bar shopping">
								<a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{ App\Models\Cart::totalItems() }}</span></a>
								<!-- Shopping Item -->
								<div class="shopping-item">
									<div class="dropdown-cart-header">
										<span>{{ App\Models\Cart::totalItems() }} Items</span>
										<a href="{{ route('carts') }}">View Cart</a>
									</div>
									
									<ul class="shopping-list">
										@php
											$total_price = 0
										@endphp
										@foreach (App\Models\Cart::totalCarts() as $cart)
										<li>
											<form class="form-inline" action="{{route('carts.delete', $cart->id) }}" method="post">
											@csrf
												<input type="hidden" name="cart_id">
												<button type="submit"><i class="fa fa-remove"></i></button>
											</form>
											
											@if($cart->product->images->count() > 0)
											<a class="cart-img" href="#"><img src="{{ asset('images/products/'.$cart->product->images->first()->image)}}"></a>
											@endif
											<h4><a href="{{route('products.show', $cart->product->slug)}}">{{ $cart->product->title}}</h4>
											<p class="quantity">{{ $cart->product->price }}<span class="amount"><span></span></p>
										</li>
										@php
											$total_price +=  $cart->product->price * $cart->product_quantity
										@endphp
										
										@endforeach
									</ul>
									<div class="bottom">
										<div class="total">
											<span>Total</span>
											<span class="total-amount"></span>
											{{ $total_price }}
										</div>
										<a href="{{route('checkouts')}}" class="btn animate">Checkout</a>
									</div>
								</div>
								<!--/ End Shopping Item -->
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						<div class="col-lg-9 col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">	
										<div class="nav-inner">	
										
											<ul class="nav main-menu menu navbar-nav">
													<li class="active"><a href="{{ route('index') }}">Home</a></li>
													<li><a href="{{ route('products') }}">Product</a></li>									
													<li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
														<ul class="dropdown">
								
															<li><a href="{{ route('carts') }}">Cart</a></li>
														</ul>
													</li>									
													<li><a href="{{ route('contact') }}">Contact Us</a></li>
												</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
	<!--/ End Header -->
	


	

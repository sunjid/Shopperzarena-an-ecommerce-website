@extends('frontend.layouts.master')
@section('title')
  {{ $products->title}}
@endsection
@section('content')    
  <!-- Start Blog Single -->
		<section class="blog-single section">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="blog-single-main">
							<div class="row">
								<div class="col-12">
									<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                      <div class="carousel-inner">
                                        @php
                                          $i=1;
                                        @endphp
                                        @foreach($products->images as $image)
                                          <div class="product-item carousel-item {{ $i==1 ? 'active' : ''}}">
                                            <img class="d-block w-100" src="{{asset('images/products/'.$image->image)}}" alt="First slide">
                                          </div>
                                          @php
                                            $i++;
                                          @endphp
                                        @endforeach
                                      </div>
                                      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                      </a>
                                      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                      </a>
                                      </div>
								</div>		
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="main-sidebar">
							<!-- Single Widget -->
							<h4>{{$products->title}}</h4>
							
							<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam ut, eius dolorum et magni nulla dolorem quasi ipsum dignissimos possimus saepe quisquam sapiente voluptatem deleniti sint dolore placeat quidem. Libero. </p>
							<h5>price: &#2547; {{$products->price}} </h5>
							<br>
							<!--/ End Single Widget -->
							<!-- Single Widget -->
							
							<!-- Single Widget -->
							<div class="single-widget side-tags">
								<h3 class="title">Category <span class="badge badge-info">{{$products->category->name}}</span></h3>
								<h3 class="title">Brand <span class="badge badge-info">{{$products->brand->name}}
								</span></h3>
								<div class="button5">
										<a href="{{route('checkouts')}}" class="btn width">Add To Cart</a>
									</div>
							</div>
							<!--/ End Single Widget -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Blog Single -->
		
@endsection

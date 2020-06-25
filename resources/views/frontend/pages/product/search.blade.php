@extends('frontend.layouts.master')
@section('content')
<!-- Start Most Popular -->
	<div class="product-area most-popular section">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Searched Products for <span class="badge badge-primary">{{$search}}</span></h2>
					</div>
				</div>
            </div>
            <div class="row">
                <div class="col-12">
                    @include('frontend.pages.product.partials.all_products')
                </div>
            </div>
        </div>
    </div>
	<!-- End Most Popular Area -->
@endsection

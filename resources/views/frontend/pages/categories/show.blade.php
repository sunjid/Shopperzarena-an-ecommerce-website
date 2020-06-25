@extends('frontend.layouts.master')
@section('content')

  <!-- Start Most Popular -->
	<div class="product-area most-popular section">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Searched Products for <span class="badge badge-info">{{$category->name}} Category</span></h2>
					</div>
				</div>
            </div>
            <div class="row">
                <div class="col-12">
				@php
             $products = $category->products()->paginate(9);
          @endphp
          @if( $products->count() > 0)
                    @include('frontend.pages.product.partials.all_products')
				@else
			<div class="alert alert-warning">
                No Product Has added yet in this Category
            </div>
            @endif
                </div>
            </div>
        </div>
    </div>
	<!-- End Most Popular Area -->
  @endsection
<div class="owl-carousel popular-slider">
    @foreach ($products as $product)
      <!-- Start Single Product -->
      <div class="single-product">
          <div class="product-img">
            @php $i=1; @endphp.
              @foreach($product->images as $image)
                 @if ($i>0)
                    <a href="{{route('products.show',$product->slug)}}">
                      <img class="card-img-top feature-img" src="{{ asset('images/products/'.$image->image) }}" alt="{{$product->title}}">
                    </a>
                  @endif
                @php $i--; @endphp
              @endforeach
                <div class="button-head">
                  <div class="product-action">
                    <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                    <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                    <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                  </div>
                  <div class="product-action-2">
                    <form class="form-inline" action="{{ route('carts.store')}}" method="post">
                      @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id}}">
                        <button type="submit" class="btn-cart" ><a>Add To Cart</a> </button>
                    </form>
                  </div>
              </div>
          </div>
          <div class="product-content">
          <h3><a href="{{route('products.show',$product->slug)}}">{{$product->title}}</a></h3>
            <div class="product-price">
                <span>&#2547; {{$product->price}}</span>
            </div>
          </div>
        </div>
      @endforeach
      <!-- End Single Product -->
</div>
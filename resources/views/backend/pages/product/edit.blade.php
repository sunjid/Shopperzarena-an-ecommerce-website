@extends('backend.layouts.master')
@section('content')
  <div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
              <div class="card-header">
                Edit Product
              </div>
              <div class="card-body">
                  <form action="{{ route('admin.product.update', $products->id) }}" method="post" enctype="multipart/form-data"   class="forms-sample">
                    {{ csrf_field()}}
                    @include('backend.partials.messages')
                      <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" class="form-control" name="title" value="{{$products->title}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea name="description" class="form-control" id="exampleTextarea1" rows="4" >{{$products->description}}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Price</label>
                        <input type="number" class="form-control"  name="price" value="{{$products->price}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Quantity</label>
                        <input type="number" class="form-control" name="quantity" value="{{$products->quantity}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Select Category</label>
                        <select class="form-control" name="category_id">
                            <option value="">Select a category for the product</option>
                              @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent)
                                <option value="{{ $parent->id }}" {{ $parent->id == $products->category->id ? 'Selected' : ''}}>{{ $parent->name }}</option>
                                @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
                        				      <option value="{{ $child->id }}" {{ $child->id == $products->category->id ? 'Selected' : ''}}>------>{{ $child->name }}</option>
                        				@endforeach
                              @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Select Brand</label>
                        <select class="form-control" name="brand_id">
                            <option value="">Select a Brand for the Product</option>
                              @foreach(App\Models\Brand::orderBy('name','asc')->get() as $br)
                                <option value="{{ $br->id }}"{{ $br->id == $products->brand->id ? 'Selected' : ''}}>{{ $br->name }}</option>
                              @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="product_image">Product Image</label>
                        <div class="row">
                          <div class="col-md-4">
                            <input type="file" class="form-control" name="product_image[]" id="product_image">
                          </div>
                          <div class="col-md-4">
                            <input type="file" class="form-control" name="product_image[]" id="product_image">
                          </div>
                          <div class="col-md-4">
                            <input type="file" class="form-control" name="product_image[]" id="product_image">
                          </div>
                          <div class="col-md-4">
                            <input type="file" class="form-control" name="product_image[]" id="product_image">
                          </div>
                          <div class="col-md-4">
                            <input type="file" class="form-control" name="product_image[]" id="product_image">
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Update Product</button>
                    </form>
              </div>
            </div>
          </div>
@endsection

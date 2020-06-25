@extends('backend.layouts.master')
@section('content')
  <div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
              <div class="card-header">
                Edit Brand
              </div>
              <div class="card-body">
                <form action="{{ route('admin.brand.update', $brand->id) }}" method="post" enctype="multipart/form-data"   class="forms-sample">
                  @csrf
                  @include('backend.partials.messages')
                    <div class="form-group">
                      <label for="name">Name(optional)</label>
                      <input type="text" class="form-control" name="name" id="name" value="{{ $brand->name }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Description(optional)</label>
                      <textarea name="description" class="form-control" id="exampleTextarea1" rows="4">{{$brand->description}}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="image">Brand Old Image </label> <br>
                      <img src="{{asset('images/brands/'.$brand->image)}}" width="100"> <br>
                      <label for="image">Brand New Image(optional) </label>
                    </div>
                    <input type="file" class="form-control" name="image" id="image">
                    <button type="submit" class="btn btn-primary mr-2">Update Brand</button>
                  </form>
                  <br>

              </div>
            </div>
          </div>
@endsection

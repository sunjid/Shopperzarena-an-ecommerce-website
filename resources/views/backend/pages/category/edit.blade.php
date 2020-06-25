@extends('backend.layouts.master')
@section('content')
  <div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
              <div class="card-header">
                Edit Category
              </div>
              <div class="card-body">
                <form action="{{ route('admin.category.update', $category->id) }}" method="post" enctype="multipart/form-data"   class="forms-sample">
                  @csrf
                  @include('backend.partials.messages')
                    <div class="form-group">
                      <label for="name">Name(optional)</label>
                      <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Description(optional)</label>
                      <textarea name="description" class="form-control" id="exampleTextarea1" rows="4">{{$category->description}}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="name">Category Name</label>
                      <select class="form-control" name="parent_id">
                        <option value="">Please Select a Primary Category</option>
                        @foreach ($main_categories as $cat)
                          <option value="{{$cat->id}}"{{$cat->id == $category->parent_id ? 'selected' : ''}}> {{ $cat->name}} </option>
                        @endforeach
                      </select>
                    </div>


                    <div class="form-group">
                      <label for="image">Category Old Image </label> <br>
                      <img src="{{asset('images/categories/'.$category->image)}}" width="100"> <br>
                      <label for="image">Category New Image(optional) </label>
                    </div>
                    <input type="file" class="form-control" name="image" id="image">
                    <button type="submit" class="btn btn-primary mr-2">Update Category</button>
                  </form>
                  <br>

              </div>
            </div>
          </div>
@endsection

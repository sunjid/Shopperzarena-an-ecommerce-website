@extends('backend.layouts.master')
@section('content')
  <div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
              <div class="card-header">
                Add Category
              </div>
              <div class="card-body">
                  <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data"   class="forms-sample">
                    @csrf
                    @include('backend.partials.messages')
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea name="description" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="name">Parent Category (optional)</label>

                        <select class="form-control" name="parent_id">
                          <option value="">Please Select a Primary Category</option>
                          @foreach ($main_categories as $category)
                            <option value="{{$category->id}}"> {{ $category->name}} </option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="image">Category Image (optional)</label>
                        <div class="row">
                          <div class="col-md-4">
                            <input type="file" class="form-control" name="image" id="image">
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Add Category</button>
                    </form>
              </div>
            </div>
          </div>
@endsection

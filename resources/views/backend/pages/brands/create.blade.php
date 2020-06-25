@extends('backend.layouts.master')
@section('content')
  <div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
              <div class="card-header">
                Add Brand
              </div>
              <div class="card-body">
                  <form action="{{ route('admin.brand.store') }}" method="post" enctype="multipart/form-data"   class="forms-sample">
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
                        <label for="image">Brand Image (optional)</label>
                        <div class="row">
                          <div class="col-md-4">
                            <input type="file" class="form-control" name="image" id="image">
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Add Brand</button>
                    </form>
              </div>
            </div>
          </div>
@endsection

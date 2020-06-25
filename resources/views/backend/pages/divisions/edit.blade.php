@extends('backend.layouts.master')
@section('content')
  <div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
              <div class="card-header">
                Add Category
              </div>
              <div class="card-body">
                  <form action="{{ route('admin.division.update', $division->id) }}" method="post" enctype="multipart/form-data"   class="forms-sample">
                    @csrf
                    @include('backend.partials.messages')
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Priority</label>
                        <input type="text" class="form-control" name="priority" id="priority">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Add Division</button>
                    </form>
              </div>
            </div>
          </div>
@endsection

@extends('backend.layouts.master')
@section('content')
  <div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
              <div class="card-header">
                Add District
              </div>
              <div class="card-body">
                  <form action="{{ route('admin.district.store') }}" method="post" class="forms-sample">
                    {{ csrf_field()}}
                    @include('backend.partials.messages')
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Select a division for a District</label>
                      <select class="form-control" name="division_id">
                          <option value="">Please select a division for a District</option>
                              @foreach($divisions as $division)
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                              @endforeach
                      </select>
                    </div>
                      <button type="submit" class="btn btn-primary mr-2">Add District</button>
                    </form>
              </div>
            </div>
          </div>
@endsection

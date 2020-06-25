@extends('backend.layouts.master')
@section('content')
  <div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
              <div class="card-header">
                Manage Product
              </div>
                <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    @include('backend.partials.messages')
                    <table class="table table-bordered" id="dataTable">
                      <thead>
                        <tr>
                          <th> Id </th>
                          <th>Product Code</th>
                          <th> Product Title </th>
                          <th> Price </th>
                          <th> Quantity </th>
                          <th> Action </th>
                        </tr>
                     </thead>
                     <tbody>
                       @foreach($products as $products)
                       <tr>
                         <td>#</td>
                         <td>#PC-{{ $products->id }} </td>
                         <td>{{ $products->title }} </td>
                         <td> {{ $products->price }} </td>
                         <td> {{ $products->quantity }} </td>
                         <td>
                           <a href="{{ route('admin.product.edit', $products->id)}}" class="btn btn-success" >Edit</a>
                           <a href="#deleteModal{{ $products->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>
                           <!-- Modal -->
                             <div class="modal fade" id="deleteModal{{ $products->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog" role="document">
                               <div class="modal-content">
                                 <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                   </button>
                                 </div>
                                 <div class="modal-body">
                                   <form action="{{ route('admin.product.delete', $products->id) }}"  method="post">
                                     {{ csrf_field() }}
                                     <button type="submit" class="btn btn-danger"> Permanent Delete </button>
                                   </form>
                                 </div>
                                 <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                 </div>
                               </div>
                             </div>
                             </div>

                         </td>
                       </tr>
                       @endforeach
                      <tfoot>
                        <tr>
                          <th> Id </th>
                          <th> Product Code </th>
                          <th> Product Title </th>
                          <th> Price </th>
                          <th> Quantity </th>
                          <th> Action </th>
                        </tr>
                      </tfoot>
                     </tbody>

                    </table>
                  </div>
                </div>
              </div>


            </div>
          </div>
@endsection

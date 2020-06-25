@extends('backend.layouts.master')
@section('content')
  <div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
              <div class="card-header">
                View #LE-{{ $order->id }}
              </div>
                <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    @include('backend.partials.messages')
                    <h3>Order Infromation</h3>
                    <hr>
                    <div class="row">
                      <div class="col-md-6 border-right">
                        <p> <strong>Order Name: </strong> {{ $order->name }} </p>
                        <p> <strong>Order Phone: </strong> {{ $order->phone_no }} </p>
                        <p> <strong>Order Email: </strong> {{ $order->email }} </p>
                        <p> <strong>Order Shipping Address: </strong> {{ $order->shipping_address }} </p>
                      </div>
                      <div class="col-md-6">
                        <p> <strong>Order Payment Method: </strong> {{ $order->payment->name }} </p>
                        <p> <strong>Order Transaction Id: </strong> {{ $order->transaction_id}} </p>
                      </div>
                    </div>
                    <br>
                    <h3>Ordered Item</h3>
                    <hr>
                    @if($order->carts->count() > 0)
                    <table class="table table-bordered table-stripe">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Product</th>
                            <th>Product Image</th>
                            <th>Product Quantity</th>
                            <th>Unit Price</th>
                            <th>Sub Total Price</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                              $total_price = 0
                          @endphp
                          @foreach($order->carts as $cart)
                            <tr>
                            <td>{{ $loop->index+1}}</td>
                            <td>
                              <a href="{{route('products.show', $cart->product->slug)}}">{{ $cart->product->title}}</a>
                            </td>
                            <td>
                              @if($cart->product->images->count() > 0)
                                <img src="{{ asset('images/products/'.$cart->product->images->first()->image)}}" width="100px">
                              @endif
                            </td>
                            <td>
                              <form class="form-inline" action="{{route('carts.update', $cart->id) }}" method="post">
                              @csrf
                                <input type="number" name="product_quantity" class="form-control" value="{{ $cart->product_quantity}}">
                                <button type="submit" class="btn btn-success">Update</button>
                              </form>
                            </td>
                            <td>
                              {{ $cart->product->price }}
                            </td>
                            <td>

                              @php
                                $total_price +=  $cart->product->price * $cart->product_quantity
                              @endphp

                              {{ $cart->product->price * $cart->product_quantity }}

                            </td>
                            <td>
                              <form class="form-inline" action="{{route('carts.delete', $cart->id) }}" method="post">
                              @csrf
                                <input type="hidden" name="cart_id">
                                <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                            </td>
                          </tr>
                          @endforeach
                          <tr>
                            <td colspan="4"></td>
                            <td>Total Amount: </td>
                            <td colspan="2">
                              <strong> {{ $total_price }} Taka </strong>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    @endif
                    <hr>
                    <form  action="{{ route('admin.order.charge', $order->id)}}" method="post" class="">
                      @csrf
                        <label for="">Shipping Cost </label>
                        <input type="number" name="shipping_charge" id="shipping_charge" value="{{ $order->shipping_charge }}">
                        <br>
                        <label for="">Custom Discount </label>
                        <input type="number" name="custom_discount" id="custom_discount" value="{{ $order->custom_discount }}">
                        <br>
                        <input type="submit" value="Update" class="ml-2 btn btn-success">
                        <a href=" {{ route('admin.order.invoice', $order->id) }} " class="btn btn-info">Generate Pdf</a>                  
                    </form>

                    <hr>
                    <form  action="{{ route('admin.order.completed', $order->id)}}" method="post" class="form-inline" style="display: inline-block!important">
                      @csrf
                      @if ($order->is_completed)
                        <input type="submit" value="Cancel Order" class="btn btn-danger">
                      @else
                        <input type="submit" value="Complete Order" class="btn btn-success">
                      @endif
                    </form>

                    <form action="{{ route('admin.order.paid', $order->id)}}" method="post" class="form-inline" style="display: inline-block!important">
                      @csrf
                      @if ($order->is_paid)
                        <input type="submit" value="Cancel Payment" class="btn btn-danger">
                      @else
                        <input type="submit" value="Paid Order" class="btn btn-success">
                      @endif
                    </form>
                  </div>
                </div>
              </div>


            </div>
          </div>
@endsection

<!DOCTYPE html>
<html>
<head>
  <title>Invoice {{ $order->id }}</title>
  <link rel="stylesheet" href="{{ asset('css/admin_style.css') }}">
  <style>
    .content-wrapper{
      background: #fff;
    }
    .invoice-header{
      background: #f7f7f7;
      padding: 10px 20px 10px 20px;
      border-bottom: 1px solid gray;
    }
    .invoice-right-top h3{
      padding-right: 20px;
      margin-top: 20px;
      color: blue;
      font-size: 55px!important;
      font-family: serif;
    }
    .invoice-left-top{
      border-left: 4px solid blue;
      padding-left:20px;
      padding-top:20px;
    }
    thead{
      background:blue;
      color: #fff;
    }
    .authority h5{
      margin-top: -10px;
      color:blue;
    }
    .thanksh4{
      color: blue;
      font-size: 25px;
      font-weight: normal;
      font-family: serif;
      margin-top: 20px;
    }
    .site-address p{
      line-height: 6px;
      font-height:300;
    }

  </style>
</head>
<body>
  
       
          <div class="content-wrapper">
            <div class="invoice-header">
            <div class="float-left site-logo">
              <img src=" {{ asset('images/favicon.png') }} " alt="">
            </div>
              <div class="float-right site-address">
                <h4>E-commerce Shop</h4>
                <p>Address:344/1, Road No: 4, Tilpapara,</p>
                <p>Khilgaon, Dhaka-1219</p>
                <p>Email: <a href="mailto:sarwarsunjid@gmail.com">sarwarsunjid@gmail.com</a></p>
                <p>Contact No: 01914583690</p>
              </div>
              <div class="clearfix"></div>
            </div>
            
            <div class="invoice-description">
              <div class="invoice-left-top float-left">
                <h6>Invoice To</h6>
                <h3> {{ $order->name }} </h3>
                <div class="address">
                <p> 
                  <strong>Address: </strong>
                  {{$order->shipping_address}}
                </p>
                <p>Contact No. {{$order->phone_no}}</p>
                <p>Email: <a href="mailto:{{$order->email}}">{{$order->email}}</a></p>
                </div>
              </div>

              <div class="invoice-right-top float-right">
                <h3>Invoice #LE-{{$order->id}}</h3>
                <p>
                  {{$order->created_at}}
                </p>
              </div>  
              <div class="clearfix"></div>
            </div>
            <br>
            <div class=""> 
                    <h3>Products</h3>
                    <hr>
                    @if($order->carts->count() > 0)
                    <table class="table table-bordered table-stripe">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Product</th>
                            <th>Product Image</th>
                            <th>Product Quantity</th>
                            
                            <th>Sub Total Price</th>
                            
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
                              {{ $cart->product_quantity}}
                            </td>
                            <td>
                              {{ $cart->product->price }} Taka
                            </td>
                            <td>

                              @php
                                $total_price +=  $cart->product->price * $cart->product_quantity
                              @endphp
                              {{ $cart->product->price * $cart->product_quantity }}
                            </td>
                            
                          </tr>
                          @endforeach
                          <tr>
                            <td colspan="3"></td>
                            <td>Discount: </td>
                            <td colspan="2">
                              <strong> {{ $order->custom_discount }} Taka </strong>
                            </td>
                          </tr>
                          <tr>
                            <td colspan="3"></td>
                            <td>Shipping Cost: </td>
                            <td colspan="2">
                              <strong> {{ $order->shipping_charge }} Taka </strong>
                            </td>
                          </tr>
                          <tr>
                            <td colspan="3"></td>
                            <td>Total Amount: </td>
                            <td colspan="2">
                              <strong> {{ $total_price + $order->shipping_charge - $order->custom_discount  }} Taka </strong>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    @endif
                    <div class="thanks mt-3">
                      <h4>Thank you for your business</h4>
                    </div>
                    <div class="authority float-right mt-5">
                      <p>----------------------------------</p>
                      <h5>Authority Signature</h5>
                      <div class="clearfix"></div>
                    </div>
                </div>
              </div>
</body>
</html>
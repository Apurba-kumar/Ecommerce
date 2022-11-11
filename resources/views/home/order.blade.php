<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
      <!-- font awesome style -->
      <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
<style>
    .center{
        margin: auto;
        width: 70%;
        padding: 30px;
        text-align: center;
    }
    table,th,td
    {
        border: 2px solid black;

    }
    th{
        padding: 10px;
        background-color: lightslategray;
        font-size: 20px;
        font-weight: bold;
    }
</style>
   </head>
   <body>

         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
         <div class="center">
            <table>
                <tr>
                    <th>Product Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Image</th>
                    <th>Cancel Order</th>
                </tr>
                @foreach ($order as $order)

                <tr>
                    <td>{{ $order->product_title }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->payment_status }}</td>
                    <td> {{ $order->delivery_status }}</td>
                    <td>
                        <img height="100" width="180" src="product/{{ $order->image }}" alt="">
                    </td>
                    <td>
                        @if ($order->delivery_status=='processing')


                        <a onclick="return confirm('Are sure to cancel the order?')" class="btn btn-danger" href="{{ url('cancel_order', $order->id) }}">Cancel Order</a>
                        @else
                          <p>Not allowed.</p>
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
         </div>


      <!-- jQery -->
      <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
      <!-- popper js -->
      <script src="{{ asset('js/popper.min.js') }}"></script>
      <!-- bootstrap js -->
      <script src="{{ asset('js/bootstrap.js') }}"></script>
      <!-- custom js -->
      <script src="{{ asset('js/custom.js') }}"></script>
   </body>
</html>

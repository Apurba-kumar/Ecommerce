@extends('layout')

@section('head')
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
@endsection



 @section('product')
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

 @endsection


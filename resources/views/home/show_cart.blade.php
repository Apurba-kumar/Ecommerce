@extends('layout')

@section('head')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style type="text/css">
    .center {
        margin: auto;
        widows: 50%;
        border: 2px solid white;
        text-align: center;
        margin-top: 40px;
    }

    .font_size {
        text-align: center;
        font-size: 40px;
        padding-top: 20px;
        padding-bottom: 40px;
    }

    .table tbody tr td img {
        width: 80%;
        height: 150px;
        border-radius: 0%;

    }

    .table tbody tr td {
        text-align: center;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: middle;

    }
    .total_price{
        font-size: 25px;
        padding: 20px;
        text-align: center;
    }
    .payment_button{
        font-size: 25px;
        padding: 20px;
        text-align: center;
    }
</style>

@endsection

@section('product')
@if (session()->has('message'))
<div class="alert alert-success">
    <button type="button" class="close"data-dismiss="alert" aria-hidden="true">
        x
    </button>
    {{ session()->get('message') }}

</div>
@endif

<h1 class="font_size"> Cart Product</h1>
<div class="row">
    <div class="col-md-6 mx-auto">
        <table class="table table-bordered">
            <thead class="center">
                <tr class="bg-light font-weight-bold">
                    <td>Product title</td>
                    <td>Product quantity</td>
                    {{-- <td>Rate</td> --}}
                    <td>Price</td>
                    <td>Image</td>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody class="center" style="text-align: center">
                <tr>
                    <?php $totalprice = 0; ?>
                    @foreach ($cart as $cart)
                <tr class="bg-dark text-white font-weight-bold">
                    <td>{{ $cart->product_title }}</td>
                    <td>{{ $cart->quantity }}</td>
                    {{-- <td>{{ $cart->rate }}</td> --}}
                    <td>${{ $cart->price }}</td>
                    <td>
                        <img src="/product/{{ $cart->image }}" alt="" class="img-fluid mx-auto">
                    </td>
                    <td>
                        <a href="{{ url('remove_cart', $cart->id) }}" class="btn btn-danger"
                            onclick="confirmation(event)">Remove</a>
                    </td>
                </tr>
                <?php $totalprice = $totalprice + $cart->price ?>
                @endforeach

                </tr>
            </tbody>
        </table>
        <div>
            <h1 class="total_price"> Total Price : ${{ $totalprice }}</h1>
        </div>
        <div class="payment_button">
            <h1 style="padding: 20px">Proceed to Order</h1>
            <a href="{{ url('cash_order') }}" class="btn btn-danger">Cash on Delivery</a>
            <a href="{{ url('stripe', $totalprice) }}" class="btn btn-danger">Pay Using Card</a>

        </div>
    </div>
</div>

</div>
@endsection

@section('script')
<script>
    function confirmation(ev) {
      ev.preventDefault();
      var urlToRedirect = ev.currentTarget.getAttribute('href');
      console.log(urlToRedirect);
      swal({
          title: "Are you sure to cancel this product",
          text: "You will not be able to revert this!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willCancel) => {
          if (willCancel) {



              window.location.href = urlToRedirect;

          }


      });


  }
</script>

@endsection

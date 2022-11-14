@extends('layout')

@section('head')
   <base href="/public">
@endsection


 @section('product')
 <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width: 50%; padding: 30px" >


    <div style="padding: 20px; ">
        <img src="product/{{$product->image}}" alt="" width="500px" height="400px" >
     </div>
       <div class="detail-box">
          <h5>
             {{ $product->title }}
          </h5>
          @if ($product->discount_price!= null)
          <h6 style="color: red">
           Discount Price
           <br>
           {{ $product->discount_price }} Taka
          </h6>

          <h6 style="text-decoration: line-through; color:blue">
           {{ $product->price }} Taka
          </h6>
          @else
          <h6 style="color:blue">
           Price
           <br>
           {{ $product->price }} Taka
          </h6>
          @endif
          <h6>Product Category : {{ $product->category }}</h6>
          <h6>Product Details : {{ $product->description }}</h6>
          <h6>Available Quantity : {{ $product->quantity }}</h6>
          <form action="{{ url('add_cart', $product->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <input type="number" name="quantity" value="1" min="1" width="100px">
                </div>
                <div class="col-md-4">
                    <input type="submit" value="Add to cart">
                </div>
            </div>
          </form>
       </div>
    </div>
 </div>

 @endsection





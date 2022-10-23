<!DOCTYPE html>
<html lang="en">
  <head>
@include('admin.css')
<style type="text/css">
     .center{
       margin: auto;
       widows: 50%;
       border: 2px solid white;
       text-align: center;
       margin-top: 40px;
     }
     .font_size{
        text-align: center;
        font-size: 40px;
        padding-top: 20px;
     }
     .table tbody tr td img{
        width: 80%;
        height: 150px;
        border-radius: 0%;

     }
</style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
       @include('admin.sidebar')
      <!-- partial -->

        <!-- partial:partials/_navbar.html -->
  @include('admin.header')
        <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <h2 class="font_size">All Product</h2>
            <table class="table table-bordered">
                <thead class="center">
                    <tr class="bg-white font-weight-bold">
                        <td>Product title</td>
                        <td> Description</td>
                        <td>Quantity</td>
                        <td>Category</td>
                        <td>Price</td>
                        <td>Discount Price</td>
                        <td>Product Image</td>
                     </tr>
                </thead>
                <tbody class="center">
                    <tr>

                        @foreach ($product as $product)
                                <tr class="bg-dark text-white font-weight-bold">
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->discount_price}}</td>
                                    <td>
                                        <img src="/product/{{ $product->image }}" alt="" class="img-fluid mx-auto">
                                    </td>
                                </tr>
                            @endforeach

                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@include('admin.script')
  </body>
</html>

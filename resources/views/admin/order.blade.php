<!DOCTYPE html>
<html lang="en">

<head>

    @include('admin.css')
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
        }

        .table tbody tr td img {
            width: 100%;
            height: 100px;
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
            <div class="content-wrapper" style="overflow-x:auto;">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close"data-dismiss="alert" aria-hidden="true">
                            x
                        </button>
                        {{ session()->get('message') }}

                    </div>
                @endif
                <h2 class="font_size">Order</h2>
                <div style="padding-bottom: 20px; padding-left: 400px">
                    <form action="{{ url('search') }}" method="GET">
                        @csrf
                        <input type="text" placeholder="Search Here" name="search" style="color: black">
                        <input type="submit" class="btn btn-outline-primary" value="Search">
                    </form>
                </div>
                <table class="table table-bordered" width:100%>
                    <thead class="center">
                        <tr class="bg-white font-weight-bold">
                            <td>Name</td>
                            <td>Email</td>
                            <td>Address</td>
                            <td>Phone</td>
                            <td>Product Title</td>
                            <td>Quantity</td>
                            <td>Price</td>
                            <td>Payment Status</td>
                            <td>Delivery Status</td>
                            <td>Product Image</td>
                            <td>Delivered</td>
                            <td>Print PDF</td>
                            <td>Send Email</td>
                        </tr>
                    </thead>
                    <tbody class="center">
                        <tr>

                            @forelse ($order as $order)
                        <tr class="bg-dark text-white font-weight-bold">
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->product_title }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->payment_status }}</td>

                            <td>{{ $order->delivery_status }}</td>
                            <td>
                                <img src="/product/{{ $order->image }}" alt="" class="img-fluid mx-auto">
                            </td>
                            <td>
                                @if ($order->delivery_status == 'processing')
                                    <a href="{{ url('delivered', $order->id) }}"
                                        onclick="return confirm('Are you sure this prodiuct is delivered ?')"
                                        class="btn btn-success">Delivered</a>
                                @else
                                    <p style="color:green">Delivered</p>
                                @endif

                            </td>
                            <td>
                                <a href="{{ url('print_pdf', $order->id) }}" class="btn btn-secondary">Print PDF</a>
                            </td>
                            <td>
                                <a href="{{ url('send_email', $order->id) }}" class="btn btn-info">Send email</a>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="16">
                                No Data Found!
                            </td>
                        </tr>
                        @endforelse

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.script')
</body>

</html>

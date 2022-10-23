<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 10px;
        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .input_color {
            color: black;
        }

        .center {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;
            background: rgb(95, 91, 91);
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
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close"data-dismiss="alert" aria-hidden="true">
                            x
                        </button>
                        {{ session()->get('message') }}

                    </div>
                @endif

                <div class="div_center">

                </div>
                <div class="row mt-5 mb-5">
                    <div class="col-md-6 mx-auto">
                        <h2 class="h2_font">Add Category</h2>
                        <form action="{{ url('/add_category') }}" method="POST">
                            @csrf

                            <input type="text" class="input_color form-control rounded" name="category" placeholder="Write category name">
                            <input type="submit" class="btn btn-success form-control mt-3" name="submit" value="Add category">
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <h2 class="h2_font">Category List</h2>
                        <table class=" table table-bordered">
                            <thead class="bg-white">
                                <tr>
                                    <td>Category Name</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                <tr>
                                    <td>{{ $data->category_name }}</td>
                                    <td>
                                        <a onclick="return confirm('Are you sure to delete this category?')" class="btn btn-danger" href="{{ url('delete_category', $data->id) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.script')
</body>

</html>

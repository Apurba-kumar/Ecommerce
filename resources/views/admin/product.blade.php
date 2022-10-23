<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style>
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .font_size {
            font-size: 40px;
            padding-bottom: 40px;
        }
        .form-control { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: rgb(11, 11, 11);
            opacity: 1; /* Firefox */
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
                <div class="div_center form">
                    <h1 class="font_size">Product</h1>
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <form  action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mt-3 mb-3 ">
                                    <label for="" class="form-label">Product Title:</label>
                                    <input type="text" class="form-control rounded bg-white text-dark" name="title" placeholder="Write title" required="">

                                </div>
                                <div class="mt-3 mb-3">
                                    <label for="" class="form-label">Product Description:</label>
                                    <textarea type="text" class="form-control rounded bg-white text-dark" name="description" placeholder="Write description" required="" ></textarea>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mt-3 mb-3">
                                            <label for="" class="form-label">Product Price:</label>
                                            <input type="number" class="form-control rounded bg-white text-dark" name="price" placeholder="Write price" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mt-3 mb-3">
                                            <label for="" class="form-label">Discount Price:</label>
                                            <input type="number" class="form-control rounded bg-white text-dark"  name="discount_price" placeholder="Write discount price">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 mb-3">
                                    <label for="" class="form-label">Product Quantity:</label>
                                    <input type="number" class="form-control rounded bg-white text-dark" min="0" name="quantity" placeholder="Write quantity here" required="">
                                </div>
                                <div class="mt-3 mb-3">
                                    <label class="form-label">Product Category : </label>
                                    <select class="text_color form-control bg-white text-dark" name="category" required="">
                                        <option value="" selected>Add product category </option>
                                             @foreach ($category as $category)
                                        <option value="$category->category_name">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3 mb-3">
                                    <label for="" class="form-label">Upload Image:</label>
                                    <input type="file" class="form-control rounded placeholder text-light" name="image"  required="">
                                </div>
                                <div class="mt-3 mb-3">
                                    <input type="submit" class="btn btn-primary form-control rounded" name="" value="Add Product">

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('admin.script')
</body>

</html>

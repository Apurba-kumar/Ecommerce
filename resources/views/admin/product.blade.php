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

        .text_color {
            color: black;
            padding-bottom: 20px;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .div-design {
            padding-bottom: 15px;
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
                <div class="div_center">
                    <h1 class="font_size">Product</h1>
                    <form>

                    <div class="div-design">
                        <label>Product Title : </label>
                        <input class="text_color" type="text" name="title" placeholder="Write title" required="">
                    </div>
                    <div class="div-design">
                        <label>Product Description : </label>
                        <input class="text_color" type="text" name="description" placeholder="Write description" required="">
                    </div>

                    <div class="div-design">
                        <label>Product Price : </label>
                        <input class="text_color" type="number" name="price" placeholder="Write price" required="">
                    </div>

                    <div class="div-design">
                        <label>Product Discount price : </label>
                        <input class="text_color" type="number" name="discount_price"
                            placeholder="Write discount price">
                    </div>
                    <div class="div-design">
                        <label>Product Quantity : </label>
                        <input class="text_color" type="number" min="0" name="quantity"
                        placeholder="Write quantity here" required="">
                    </div>
                    <div class="div-design">
                        <label>Product Category : </label>
                        <select class="text_color" name="category" required="">
                            <option value="" selected>Add product category </option>
                            <option>shirt</option>
                        </select>
                    </div>
                    <div class="div-design" style="padding-left: 110px">
                        <label>Product Image Here: </label>
                        <input type="file" name="image" placeholder="Write image" required="">
                    </div>

                    <div>

                        <input type="submit" value="Add product" class="btn btn-primary">
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>

    @include('admin.script')
</body>

</html>

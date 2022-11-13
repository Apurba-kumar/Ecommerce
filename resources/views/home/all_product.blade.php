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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <!-- slider section -->



    <!-- product section -->
    @include('home.product_view')
    <!-- end product section -->

    {{-- Comment and Reply section --}}

    <div style="text-align: center; padding-bottom:30px">
        <h1 style="font-size: 30px; text-align: center; padding-top: 20px; padding-bottom: 20px; font-weight: bold">
            Comments</h1>
        <form action="{{ url('add_comment') }}" method="POST">
            @csrf
            <textarea style="height: 150px; width:600px" placeholder="Comment something here" name="comment"></textarea>
            <br>
            <input type="submit" class="btn btn-primary" value="Comment">
        </form>
    </div>
    <div style="padding-left:20%">
        <h1 style="font-size:20px; padding-bottom:20px">All Comments</h1>
        @foreach ($comment as $comment)
            <div>
                <b style="text-decoration: underline">{{ $comment->name }}</b>
                <p>{{ $comment->comment }}</p>
                <a style="color: blue" href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{ $comment->id }}">Reply</a>

                @foreach ($reply as $repl)
                @if ($repl->comment_id==$comment->id)
                <div style="padding-left: 3%; padding-bottom:10px; ">
                    <b>{{ $repl->name }}</b>
                    <p>{{ $repl->reply }}</p>
                    <a style="color: blue" href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{ $comment->id }}">Reply</a>

                </div>
                @endif
                @endforeach

            </div>
        @endforeach


        <div style="display: none" class="replydiv">
            <form action="{{ url('add_reply') }}" method="POST">
                @csrf
                <input type="text" id="commentId" name="commentId" hidden>
                <textarea style="height: 100px; width:500px" name="reply" placeholder="Write something Here"></textarea>
                <br>
                <button type="submit" class="btn btn-warning">Reply</button>
                <a href="javascript::void(0);" class="btn btn-primary" onclick="reply_close(this)">Close</a>
            </form>


        </div>
    </div>


    {{-- Comment and Reply section --}}

    <!-- subscribe section -->

    <!-- footer start -->
    @include('home.footer')
    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>

    <script type="text/javascript">
        function reply(caller) {
            document.getElementById('commentId').value = $(caller).attr('data-Commentid')
            $('.replydiv').insertAfter($(caller));

            $('.replydiv').show();
        }

        function reply_close(caller) {


            $('.replydiv').hide();
        }
    </script>
     <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
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

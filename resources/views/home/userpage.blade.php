@extends('layout')
@section('head')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection



@section('flash')
    @include('sweetalert::alert')
@endsection

@section('slider')
    @include('home.slider')
@endsection


@section('why')
    <!-- why section -->
@include('home.why')
<!-- end why section -->
@endsection

@section('new_arrival')
    <!-- arrival section -->
@include('home.new_arrival')
<!-- end arrival section -->
@endsection

@section('product')
<!-- product section -->
@include('home.product')
<!-- end product section -->
@endsection


{{-- Comment and Reply section --}}

@section('comment')
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
            <a style="color: blue" href="javascript::void(0);" onclick="reply(this)"
                data-Commentid="{{ $comment->id }}">Reply</a>

            @foreach ($reply as $repl)
                @if ($repl->comment_id == $comment->id)
                    <div style="padding-left: 3%; padding-bottom:10px; ">
                        <b>{{ $repl->name }}</b>
                        <p>{{ $repl->reply }}</p>
                        <a style="color: blue" href="javascript::void(0);" onclick="reply(this)"
                            data-Commentid="{{ $comment->id }}">Reply</a>

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
@endsection


{{-- Comment and Reply section --}}

@section('subscribe')
    <!-- subscribe section -->
@include('home.subscribe')
<!-- end subscribe section -->
@endsection

@section('client')
    <!-- client section -->
@include('home.client')
<!-- end client section -->
@endsection

@section('script')
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
@endsection



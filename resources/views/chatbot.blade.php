@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <h4>What Other People Want To Say</h4>
            @foreach($posts->all() as $p)
                @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status') }}
                    </div>
                @endif

                <div class="card m-2">
                    <div class="card-header">
                        <h5> {{$p->user->name}}</h5>
                        <p>{{$p->body}}</p>
                    </div>
                <div class="d-flex justify-content-between">
                    <a href="{{route('like-post',$p->id)}}" class="" onclick="like()" id="likeBtn">
                        <i class="fa fa-heart mr-2 btn text-danger">
                            {{$p->likes->count()}}
                        </i>
                    </a>
                    <form action="{{route('chat.delete',$p->id)}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button class="btn" onclick="confirm('Do You Really Want To Delete')"><i class="fa fa-trash text-danger"></i></button>
                    </form>
                </div>
            </div>
            @endforeach

            <section class="">
                <form action="{{route('chat.store')}}" method="post">
                    @csrf
                    <div class="form-group d-flex justify-content-around">
{{--                        <textarea name="body" id="body" class="" cols="60" rows="1" placeholder="What You Have To Say..."></textarea>--}}
                        <input type="text" name="body" class="form-control m-2" placeholder="Send Message">
                        <button class=" btn"> <i class="fa fa-send"></i></button>
                    </div>
                    <input type="hidden" value="{{\Illuminate\Support\Facades\Session::token()}}" name="_token">
                </form>
            </section>

        </div>
    </div>
</div>
<script>

    var token = '{{\Illuminate\Support\Facades\Session::token()}}';
    function like() {
        console.log("hello");
    }

    @endsection
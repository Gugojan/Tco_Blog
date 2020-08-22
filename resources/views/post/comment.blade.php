@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('home') }}" class = "btn btn-primary">Home</a>
                @else
                    <a href="{{ route('login') }}" class = "btn btn-primary">
                        login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">
                            register</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="content">
            <div  class="col-md-4 offset-md-5 text-danger">
                <h1>Posts</h1>

                @if(!empty( session('message')))
                    <div class="alert alert-success">
                        {{session('message')}}
                        <button type="button" class="close" aria-label="Close">
                            <a href="/close/message" class="stretched-link"><span aria-hidden="true">&times;</span></a>
                        </button>
                    </div>
                @endif

                <a href="{{url('/post/create')}}" class = "btn btn-primary">
                    add_post</a>
                <div class="w-100"></div>
                @foreach($posts as $p)


                    <table class = "table table-striped">
                        <thead>
                        <tr class="bg-dark text-white">

                            <td>title</td>
                            <td>text</td>

                        </tr>
                        </thead>

                        <tbody class="p-3 mb-2 bg-secondary text-white">
                        {{--                @foreach($product as $p)--}}
                        <tr>

                            <td>
                                {{$p->title}}
                            </td>
                            <td>
                                {{$p->text}}
                            </td>

                            <td>
                                <a href="{{url("/post/{$p->id}")}}" class = "btn btn-primary fa fa-search-plus">view</a>
                                <a href="{{url("/post/{$p->id}/edit")}}" class = "btn btn-success ">Edit</a>
                                <form action="{{url("/post/{$p->id}")}}" method = "post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class=" btn btn-danger " >delete</button>
                                </form>
                                <a href="{{url("post/{$p->id}/edit")}}" class = "btn btn-success ">comment</a>
                            </td>
                        </tr>
                        {{--                @endforeach--}}
                        </tbody>

                    </table>
                    @if($post->id === $p->id)

                        <input type="text" id="comment" class="col-md-10  ">
                        <input type="hidden" id="id" class="col-md-10 " value={{$post->id}}>
                        <td>  <button type="button" class = "btn btn-primary" id="button">send</button></td>


{{--                         <script>--}}
{{--                            let comment = document.getElementById('comment');--}}
{{--                            let button = document.getElementById('button');--}}
{{--                            let my_id = document.getElementById('id');--}}
{{--                            let id = my_id.value;--}}
{{--                            button.addEventListener('mouseup',myComment);--}}
{{--                            function myComment(e) {--}}
{{--                                let  comment = comment.value;--}}
{{--                                let formdata = new FormData;--}}
{{--                                formdata.append('comment',comment);--}}
{{--                                formdata.append('id',id);--}}
{{--                                const urlReq = window.location.origin+"/featch/"+comment+"/"+id;--}}
{{--                                let promis = fetch(urlReq,{--}}
{{--                                    method:'get',--}}
{{--                                    // method:'post',--}}
{{--                                    // body: formdata,--}}
{{--                                }).then((r)=>{--}}
{{--                                    if(r.ok){--}}
{{--                                        return r;--}}
{{--                                    }--}}
{{--                                    throw new Error('invalid status code exav')--}}
{{--                                })--}}
{{--                                promis--}}
{{--                                    .then(r=>{--}}
{{--                                        console.log(r.text())--}}
{{--                                        window.location.href = '/dev';--}}
{{--                                    })--}}
{{--                            }--}}
{{--                        </script>--}}
                    @endif
                    @foreach($comment as $com)
                        @if($com->post_id === $p->id)
                            <table class = "table table-striped">
                                <tr>
                                    <td>{{$com->comment}}</td>
                                </tr>
                                @endif
                                @endforeach
                            </table>
                            @endforeach
            </div>
        </div>
@endsection



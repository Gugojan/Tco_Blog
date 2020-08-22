@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('home') }}" class = "btn btn-primary">home</a>
                @else
                    <a href="{{ route('login') }}">
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
                <h1>Post</h1>
            </div>
            <a href="{{url('/post')}}" class = "btn btn-primary fa ">
                back
            </a>
            <div class="w-100"></div>
            <table class = "table table-striped">
                <thead>
                <tr class="bg-dark text-white">

                    <td>title</td>
                    <td>text</td>

                </tr>
                </thead>
                <tbody class="p-3 mb-2 bg-secondary text-white">

                <tr>
                    <td>{{$post->title ?? ""}}</td>
                    <td>{{$post->text ?? ""}}</td>

                </tr>

                </tbody>

            </table>
            <table class = "col-md-4 offset-md-5 table table-striped">

                    <div class="col-md-4 offset-md-5 text-danger">
                        comment
                    </div>



            @foreach($myPost as $p)


                    <tr >
                        <td class="col-md-4 offset-md-5 ">{{$p->comment}}</td>
                    </tr>

            @endforeach
            </table>
        </div>
    </div>
@endsection



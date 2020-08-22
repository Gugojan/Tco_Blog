@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('home') }}" class = "btn btn-primary">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content flex-center">
            <div class="col-md-4 offset-md-5 text-danger font-weight-bold">
                <h1>update a post</h1>
            </div>
            <a href="{{url('/post')}}" class = "btn btn-primary fa ">
                back
            </a>

            <div class="card-body col-md-8  bg-success" >
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/post/{{$post->id}}" method="post" enctype="multipart/form-data" class="h3 text-white font-weight-bold">
                    @csrf
                    @method("PUT")
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">title</label>
                        <div class="col-md-6">
                            <input type="text" name = "title" id ="title" class="form-control" value="{{$post->title?? ''}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">text</label>
                        <div class="col-md-6">
                            <textarea name="text" id="text" cols="31" rows="6" placeholder="{{$post->text?? ''}}"></textarea>
                        </div>
                    </div>

                    <div class="col-md-6 offset-md-4">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>

                </form>
            </div>

        </div>
    </div>
@endsection


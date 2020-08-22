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
            <div class="col-md-4 offset-md-5 text-danger">
                <h3>Create a post</h3>
            </div>
            <a href="{{url('company/product')}}" class = "btn btn-primary fa ">
                <i class="fa fa-chevron-circle-left"></i>
            </a>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $er)
                            <li>{{$er}}</li>
                        @endforeach
                    </ul>


                </div>
            @endif
            <div class="card-body col-md-8">
                <form action="/post" method="post" >
                    @csrf
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">title</label>
                        <div class="col-md-6">
                            <input type="text" name = "title" id ="title" class="form-control ">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="text" class="col-md-4 col-form-label text-md-right">text</label>
                        <div class="col-md-6">
                            <textarea name="text" id="text" cols="55" rows="6"></textarea>
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


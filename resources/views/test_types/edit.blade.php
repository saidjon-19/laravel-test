@extends('layouts.app')

@section('title')
@endsection

@section('header')
@endsection

@section('content')

    <body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"></h1>
                            </div>

                            <form action="{{route('test_types.update',$test_type)}}" method="post">
                                @csrf
                                @method('put')
                                <label>name</label><br>
                                <input type="text" class="form-control" name="name" value="{{$test_type->name}}" id=""><br>

                                <input class="btn btn-outline-primary" type="submit">
                            </form>
                            <hr>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

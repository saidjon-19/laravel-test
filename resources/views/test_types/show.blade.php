@extends('layouts.app')

@section('title')
@endsection

@section('header')
@endsection

@section('content')
    <a class="btn btn-primary" href="{{route('test_types.index')}}">Back</a>
    <table class="table table-striped">
        <tr>
            <td>name</td>
            <td>{{$test_type->name}}</td>
        </tr>
    </table>

@endsection

@extends('layouts.app')

@section('title')
    Test_Types create
@endsection

@section('header')
    Create
@endsection

@section('content')
    <form action="{{route('test_types.store')}}" method="post">
        @csrf
        <label for="">name</label>
        <input type="text" name="name" class="form-control">
        <input type="submit" class="btn btn-primary" value="Save">
    </form>
@endsection

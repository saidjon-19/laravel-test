@extends('layouts.app')

@section('title')

@endsection

@section('header')
@endsection

@section('content')
    <a class="btn btn-primary" href="{{route('variants.index')}}">Back</a>
    <table class="table table-striped">
        <tr>
            <td>question_id:</td>
            <td>{{ optional($variant->question)->title}}</td>
        </tr>
        <tr>
            <td>name:</td>
            <td>{{$variant->name}}</td>
        </tr>
        <tr>
            <td>is_correct:</td>
            <td>{{ $variant->is_correct }}</td>
        </tr>
    </table>
@endsection

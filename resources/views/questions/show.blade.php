@extends('layouts.app')

@section('title')

@endsection

@section('header')
@endsection

@section('content')
    <a class="btn btn-primary" href="{{route('questions.index')}}">Back</a>
    <table class="table table-striped">
        <tr>
            <td>test_type_id:</td>
            <td>{{ optional($question->test_type)->name}}</td>
        </tr>
        <tr>
            <td>user_id:</td>
            <td>{{ optional($question->user)->name}}</td>
        </tr>
        <tr>
            <td>title:</td>
            <td>{{$question->title}}</td>
        </tr>
        <tr>
            <td>type:</td>
            <td>{{ $question->type }}</td>
        </tr>
        <tr>
            <td>explanation:</td>
            <td>{{ $question->explanation}}</td>
        </tr>
        <tr>
            <td>difficulty:</td>
            <td>{{ $question->difficulty}}</td>
        </tr>
    </table>
@endsection

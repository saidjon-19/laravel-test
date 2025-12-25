@extends('layouts.app')

@section('title')

@endsection

@section('header')
@endsection

@section('content')
    <a class="btn btn-primary" href="{{route('true_false_questions.index')}}">Back</a>
    <table class="table table-striped">
        <tr>
            <td>question_id:</td>
            <td>{{ optional($true_false_question->question)->title}}</td>
        </tr>
        <tr>
            <td>correct_answer:</td>
            <td>{{$true_false_question->correct_answer}}</td>
        </tr>
    </table>
@endsection

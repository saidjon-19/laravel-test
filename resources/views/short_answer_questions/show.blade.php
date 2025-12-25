@extends('layouts.app')

@section('title')

@endsection

@section('header')
@endsection

@section('content')
    <a class="btn btn-primary" href="{{route('short_answer_questions.index')}}">Back</a>
    <table class="table table-striped">
        <tr>
            <td>question_id:</td>
            <td>{{ optional($short_answer_question->question)->title}}</td>
        </tr>
        <tr>
            <td>correct_text:</td>
            <td>{{$short_answer_question->correct_text}}</td>
        </tr>
    </table>
@endsection

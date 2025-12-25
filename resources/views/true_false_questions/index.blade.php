@extends('layouts.app')

@section('title')
@endsection

@section('header')
@endsection

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>question_id</th>
            <th>correct_answer</th>
            <th>show</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($true_false_questions as $true_false_question)
            <tr>
                <td>{{ $true_false_question->id}}</td>
                <td>{{ optional($true_false_question->question)->title}}</td>
                <td>{{ $true_false_question->correct_answer}}</td>
                <td>
                    <a href="{{ route('true_false_questions.show', $true_false_question) }}" class="btn btn-info">show</a>
                </td>
                <td>
                    <a href="{{ route('true_false_questions.edit', $true_false_question) }}" class="btn btn-warning">edit</a>
                </td>
                <td>
                    <form action="{{ route('true_false_questions.destroy', $true_false_question) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ route('true_false_questions.create') }}" class="btn btn-primary">Добавить</a>
@endsection


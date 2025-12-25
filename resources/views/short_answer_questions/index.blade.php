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
            <th>correct_text</th>
            <th>show</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($short_answer_questions as $short_answer_question)
            <tr>
                <td>{{ $short_answer_question->id}}</td>
                <td>{{ optional($short_answer_question->question)->title}}</td>
                <td>{{ $short_answer_question->correct_text}}</td>
                <td>
                    <a href="{{ route('short_answer_questions.show', $short_answer_question) }}" class="btn btn-info">show</a>
                </td>
                <td>
                    <a href="{{ route('short_answer_questions.edit', $short_answer_question) }}" class="btn btn-warning">edit</a>
                </td>
                <td>
                    <form action="{{ route('short_answer_questions.destroy', $short_answer_question) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ route('short_answer_questions.create') }}" class="btn btn-primary">Добавить</a>
@endsection


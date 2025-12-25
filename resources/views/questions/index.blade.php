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
            <th>test_type_id</th>
            <th>user_id</th>
            <th>title</th>
            <th>type</th>
            <th>explanation</th>
            <th>difficulty</th>
            <th>show</th>
            <th>edit</th>
            <th>delete</th>


        </tr>
        </thead>
        <tbody>
        @foreach ($questions as $question)
            <tr>
                <td>{{ $question->id }}</td>
                <td>{{ optional($question->test_type)->name}}</td>
                <td>{{ optional($question->user)->name}}</td>
                <td>{{ $question->title }}</td>
                <td>{{ $question->type }}</td>
                <td>{{ $question->explanation}}</td>
                <td>{{ $question->difficulty}}</td>
                <td>
                    <a href="{{ route('questions.show', $question) }}" class="btn btn-info">show</a>
                </td>
                <td>
                    <a href="{{ route('questions.edit', $question) }}" class="btn btn-warning">edit</a>
                </td>
                <td>
                    <form action="{{ route('questions.destroy', $question) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ route('questions.create') }}" class="btn btn-primary">Добавить</a>
@endsection

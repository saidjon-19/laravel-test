@extends('layouts.app')

@section('title')
    Question
@endsection

@section('header')
    New Question
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('questions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="test_type_id" class="form-label">test_type_id</label>
            <select name="test_type_id" id="test_type_id" class="form-control">
                <option value="">Выберите тип теста</option>
                @foreach ($test_types as $test_type)
                    <option value="{{ $test_type->id }}">{{ $test_type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">user_id</label>
            <select name="user_id" id="user_id" class="form-control">
                <option value="">Выберите пользователя</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="">-- Выберите тип вопроса--</option>
                <option value="true_false">True / False</option>
                <option value="short_answer">Короткий ответ</option>
                <option value="single_choice">Один выбор</option>
                <option value="multiple_choice">Множественный выбор</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="explanation" class="form-label">explanation</label>
            <textarea name="explanation" id="explanation" class="form-control" rows="4"></textarea>
        </div>
        <div class="mb-3">
            <label for="difficulty" class="form-label">difficulty</label>
            <select name="difficulty" id="difficulty" class="form-control" required>
                <option value="">-- Выберите сложность--</option>
                <option value="easy">easy</option>
                <option value="hard">hard</option>
                <option value="medium">medium</option>

            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection

@extends('layouts.app')

@section('title')
@endsection

@section('header')
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
    <form action="{{ route('questions.update', $question) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="test_type_id" class="form-label">test_type_id</label>
            <select name="test_type_id" id="test_type_id" class="form-control">
                <option value="">Выберите тип вопроса</option>
                @foreach ($test_types as $test_type)
                    <option value="{{ $test_type->id }}" {{ old('test_type_id', $question->test_type_id) == $test_type->id ? 'selected' : '' }}>{{ $test_type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">user_id</label>
            <select name="user_id" id="user_id" class="form-control">
                <option value="">Выберите пользователя</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id', $question->user_id) == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $question->title) }}">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="">-- Выберите тип вопроса --</option>
                <option value="true_false" {{ old('type', $question->type) === 'true_false' ? 'selected' : '' }}>True / False</option>
                <option value="short_answer" {{ old('type', $question->type) === 'short_answer' ? 'selected' : '' }}>Короткий ответ</option>
                <option value="single_choice" {{ old('type', $question->type) === 'single_choice' ? 'selected' : '' }}>Один выбор</option>
                <option value="multiple_choice" {{ old('type', $question->type) === 'multiple_choice' ? 'selected' : '' }}>Множественный выбор</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="explanation" class="form-label">explanation</label>
            <textarea
                name="explanation"
                id="explanation"
                class="form-control"
                rows="4"
            >{{ old('explanation', $question->explanation) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="difficulty" class="form-label">difficulty</label>
            <select name="difficulty" id="difficulty" class="form-control" required>
                <option value="">-- Выберите сложность --</option>
                <option value="easy" {{ old('difficulty', $question->difficulty) === 'easy' ? 'selected' : '' }}>easy</option>
                <option value="medium" {{ old('difficulty', $question->difficulty) === 'medium' ? 'selected' : '' }}>medium</option>
                <option value="hard" {{ old('difficulty', $question->difficulty) === 'hard' ? 'selected' : '' }}>hard</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
@endsection

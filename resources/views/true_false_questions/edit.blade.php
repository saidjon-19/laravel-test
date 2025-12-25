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
    <form action="{{ route('true_false_questions.update', $true_false_question) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="question_id" class="form-label">question_id</label>
            <select name="question_id" id="question_id" class="form-control">
                <option value="">Выберите вопрос</option>
                @foreach ($questions as $question)
                    <option value="{{ $question->id }}" {{ old('question_id', $true_false_question->question_id) == $question->id ? 'selected' : '' }}>{{ $question->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="correct_answer" class="form-label">correct_answer</label>
            <select name="correct_answer" id="correct_answer" class="form-control" required>
                <option value="">Выберите ответ</option>
                <option value="1" {{ old('correct_answer', $true_false_question->correct_answer) == 1 ? 'selected' : '' }}> True</option>
                <option value="0"  {{ old('correct_answer', $true_false_question->correct_answer) == 0 ? 'selected' : '' }}>False</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
@endsection

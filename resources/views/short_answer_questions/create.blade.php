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
    <form action="{{ route('short_answer_questions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="question_id" class="form-label">question_id</label>
            <select name="question_id" id="question_id" class="form-control">
                <option value="">Выберите вопрос</option>
                @foreach ($questions as $question)
                    <option value="{{ $question->id }}">{{ $question->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="correct_text" class="form-label">correct_text</label>
            <input type="text" name="correct_text" id="correct_text" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection

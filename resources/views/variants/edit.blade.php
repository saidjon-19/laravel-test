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
    <form action="{{ route('variants.update', $variant) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="question_id" class="form-label">question_id</label>
            <select name="question_id" id="question_id" class="form-control">
                <option value="">Выберите вопрос</option>
                @foreach ($questions as $question)
                    <option value="{{ $question->id }}" {{ old('question_id', $variant->question_id) == $question->id ? 'selected' : '' }}>{{ $question->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $variant->name) }}" required>
        </div>
        <div class="mb-3">
            <label for="is_correct" class="form-label">Верный ответ</label>
            <select name="is_correct" id="is_correct" class="form-control">
                <option value="1" {{ old('is_correct', $variant->is_correct) == 1 ? 'selected' : '' }}>Да</option>
                <option value="0" {{ old('is_correct', $variant->is_correct) == 0 ? 'selected' : '' }}>Нет</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
@endsection

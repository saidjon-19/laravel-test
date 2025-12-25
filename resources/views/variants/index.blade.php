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
            <th>name</th>
            <th>is_correct</th>
            <th>show</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($variants as $variant)
            <tr>
                <td>{{ $variant->id}}</td>
                <td>{{ optional($variant->question)->title}}</td>
                <td>{{ $variant->name}}</td>
                <td>{{ $variant->is_correct ? 'Да' : 'Нет' }}</td>
                <td>
                    <a href="{{ route('variants.show', $variant) }}" class="btn btn-info">show</a>
                </td>
                <td>
                    <a href="{{ route('variants.edit', $variant) }}" class="btn btn-warning">edit</a>
                </td>
                <td>
                    <form action="{{ route('variants.destroy', $variant) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ route('variants.create') }}" class="btn btn-primary">Добавить</a>
@endsection


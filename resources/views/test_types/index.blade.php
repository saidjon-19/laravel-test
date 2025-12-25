@extends('layouts.app')

@section('title')
@endsection

@section('header')
@endsection

@section('content')
    <table class="table table-striped">
        <tr>
            <th>#</th>
            <th>name</th>
            <th>Show</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
        @foreach($test_types as $test_type)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$test_type->name}}</td>
                <td>
                    <a href="{{route('test_types.show',$test_type)}}" class="btn btn-outline-warning">Show</a>

                </td>
                <td>
                    <a href="{{route('test_types.edit',$test_type)}}" class="btn btn-outline-primary">Edit</a>
                </td>
                <td>
                    <form action="{{route('test_types.destroy',$test_type)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                </td>

            </tr>

        @endforeach
    </table>
    <div class="card-header">
        <a href="{{ route('test_types.create') }}" class="btn btn-primary">Добавить</a>
    </div>

@endsection

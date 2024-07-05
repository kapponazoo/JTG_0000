@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pieces</h1>
    <a href="{{ route('pieces.create') }}" class="btn btn-primary">Create New Piece</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pieces as $piece)
            <tr>
                <td>{{ $piece->id }}</td>
                <td>{{ $piece->title }}</td>
                <td>{{ $piece->description }}</td>
                <td>
                    <a href="{{ route('pieces.show', $piece->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('pieces.edit', $piece->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('pieces.destroy', $piece->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

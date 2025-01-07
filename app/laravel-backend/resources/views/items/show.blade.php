@extends('layout')

@section('content')
    <h1>Item Details</h1>
    <p><strong>Name:</strong> {{ $item->name }}</p>
    <p><strong>Description:</strong> {{ $item->description }}</p>
    <a href="{{ route('items.edit', $item->id) }}">Edit</a>
    <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <a href="{{ route('items.index') }}">Back to List</a>
@endsection

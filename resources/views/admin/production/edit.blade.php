@extends('adminlte::page')

@section('title', 'Edit production ' . $production->title)

@section('content_header')
    <h1>{{ $production->title  }}</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('admin.production.edit', $production) }}">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" aria-describedby="title" name="title" placeholder="Enter title" value="{{ $production->title }}" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control">
                <option value="mashup"
                    @if($production->type == 'mashup') selected @endif
                >Mashup</option>
                <option value="mix"
                        @if($production->type == 'mix') selected @endif
                >Mix</option>
            </select>
        </div>
        <div class="form-group">
            <label for="link">Link</label>
            <input type="url" class="form-control" id="link" aria-describedby="link" name="link" placeholder="Enter link" value="{{ $production->link }}" required>
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" class="form-control" id="year" aria-describedby="year" name="year" placeholder="Enter year" value="{{ $production->year }}" max="{{ date('Y') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="{{ route('admin.production.delete', $production) }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
    </form>
@stop

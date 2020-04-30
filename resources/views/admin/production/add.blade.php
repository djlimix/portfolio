@extends('adminlte::page')

@section('title', 'Add production')

@section('content_header')
    <h1>Add production</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('admin.production.add') }}">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" aria-describedby="title" name="title" placeholder="Enter title"  required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control">
                <option value="mashup">Mashup</option>
                <option value="mix">Mix</option>
            </select>
        </div>
        <div class="form-group">
            <label for="link">Link</label>
            <input type="url" class="form-control" id="link" aria-describedby="link" name="link" placeholder="Enter link" required>
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" class="form-control" id="year" aria-describedby="year" name="year" placeholder="Enter year" max="{{ date('Y') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@stop

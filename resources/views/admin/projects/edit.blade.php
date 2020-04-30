@extends('adminlte::page')

@section('title', 'Edit project ' . $project->title)

@section('content_header')
    <h1>{{ $project->title }}</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('admin.projects.edit', $project) }}">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" aria-describedby="title" name="title" placeholder="Enter title" value="{{ $project->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-group" required>{{ $project->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="technology">Technology</label>
            <select name="technology" id="technology" class="form-control select">
                <option value="react"
                    @if($project->technology == 'react') selected @endif
                >React</option>
                <option value="react-laravel"
                    @if($project->technology == 'react-laravel') selected @endif
                >React & Laravel</option>
                <option value="laravel"
                    @if($project->technology == 'laravel') selected @endif
                >Laravel</option>
                <option value="php"
                    @if($project->technology == 'php') selected @endif
                >PHP</option>
                <option value="wp"
                    @if($project->technology == 'wp') selected @endif
                >WordPress</option>
            </select>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control select">
                <option value="be"
                    @if($project->type == 'b') selected @endif
                >BackEnd only</option>
                <option value="full"
                    @if($project->type == 'full') selected @endif
                >BackEnd + FrontEnd</option>
            </select>
        </div>
        <div class="form-group">
            <label for="won">Won</label>
            <select name="won" id="won" class="form-control select">
                <option
                    @if($project->won === null) selected @endif
                >----</option>
                <option value="3rd"
                    @if($project->won == '3rd') selected @endif
                >3rd place JI</option>
                <option value="dean"
                    @if($project->won == 'dean') selected @endif
                >Dean's prize JI</option>
            </select>
        </div>
        <div class="form-group">
            <label for="link">Link</label>
            <input type="url" class="form-control" id="link" aria-describedby="link" name="link" placeholder="Enter link" value="{{ $project->link }}" required>
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" class="form-control" id="year" aria-describedby="year" name="year" placeholder="Enter year" value="{{ $project->year }}" max="{{ date('Y') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="{{ route('admin.projects.delete', $project) }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
    </form>
    <div class="flex-row">
        @foreach($project->images as $image)
            <img src="{{ asset('/media' . $image->url) }}" alt="img" style="width: 24%">
        @endforeach
    </div>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#description').summernote({
                height: 300,
                toolbar: ''
            });
            $('.select').select2();
        });
    </script>
@endsection

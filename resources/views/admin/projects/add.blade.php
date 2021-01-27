@extends('adminlte::page')

@section('title', 'Add project')

@section('content_header')
    <h1>Add project</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('admin.projects.add') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" aria-describedby="title" name="title" placeholder="Enter title" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-group" required></textarea>
        </div>
        <div class="form-group">
            <label for="technology">Technology</label>
            <select name="technology" id="technology" class="form-control select">
                <option value="react">React</option>
                <option value="react-laravel">React & Laravel</option>
                <option value="vue-laravel">Vue & Laravel</option>
                <option value="livewire-laravel">Livewire & Laravel</option>
                <option value="laravel">Laravel</option>
                <option value="php">PHP</option>
                <option value="wp">WordPress</option>
            </select>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control select">
                <option value="be">BackEnd only</option>
                <option value="full">BackEnd + FrontEnd</option>
            </select>
        </div>
        <div class="form-group">
            <label for="won">Won</label>
            <select name="won" id="won" class="form-control select">
                <option>----</option>
                <option value="3rd">3rd place JI</option>
                <option value="dean">Dean's prize JI</option>
            </select>
        </div>
        <div class="form-group">
            <label for="link">Link</label>
            <input type="url" class="form-control" id="link" aria-describedby="link" name="link" placeholder="Enter link">
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" class="form-control" id="year" aria-describedby="year" name="year" placeholder="Enter year" max="{{ date('Y') }}" required>
        </div>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="images">Screenshots</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="images" aria-describedby="images" name="images[]" accept="image/*" multiple required>
                <label class="custom-file-label" for="images">Choose file</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
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

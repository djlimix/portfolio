@extends('adminlte::page')

@section('title', isset($project) ? 'Edit project' : 'Add project')

@section('content_header')
    @isset($project)
        <h1>Edit project</h1>
    @else
        <h1>Add project</h1>
    @endisset
@stop

@section('content')
    <form method="POST"
          action="{{ isset($project) ? route('admin.projects.update', $project) : route('admin.projects.store') }}"
          enctype="multipart/form-data">
        @csrf
        @isset($project)
            @method('put')
        @endisset
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text"
                   @class([
		                'form-control',
                        'is-invalid' => $errors->has('title')
                   ])
                   id="title"
                   aria-describedby="title"
                   name="title"
                   placeholder="Enter title"
                   value="{{ old('title', $project->title ?? '') }}"
                   required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description"
                      id="description"
                      @class([
                           'form-control',
                           'is-invalid' => $errors->has('description')
                      ])
                      required>{{ old('description', $project->description ?? '') }}</textarea>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select
                name="type"
                id="type"
                @class([
                     'form-control',
                     'select',
                     'is-invalid' => $errors->has('type')
                ])>
                @foreach(\App\Enums\ProjectType::cases() as $type)
                    <option
                        @selected(old('type', $project->type ?? '') === $type->value)
                        value="{{ $type->value }}"
                    >
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="link">Link</label>
            <input type="url"
                   @class([
		                'form-control',
                        'is-invalid' => $errors->has('url')
                   ])
                   id="link"
                   aria-describedby="link"
                   name="link"
                   value="{{ old('link', $project->link ?? '') }}"
                   placeholder="Enter link">
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number"
                   @class([
		                'form-control',
                        'is-invalid' => $errors->has('year')
                   ])
                   id="year"
                   aria-describedby="year"
                   name="year"
                   value="{{ old('year', $project->year ?? '') }}"
                   placeholder="Enter year"
                   required>
        </div>
        <div class="form-group">
            <label for="end">End</label>
            <input type="date"
                   @class([
		                'form-control',
                        'is-invalid' => $errors->has('end')
                   ])
                   id="end"
                   aria-describedby="end"
                   name="end"
                   value="{{ old('end', $project->end ?? '') }}"
                   placeholder="Enter end">
        </div>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="images">Screenshots</span>
            </div>
            <div class="custom-file">
                <input type="file"
                       @class([
                            'custom-file-input',
                            'is-invalid' => $errors->has('images')
                       ])
                       id="images"
                       aria-describedby="images"
                       name="images[]"
                       accept="image/*"
                       multiple>
                <label class="custom-file-label" for="images">Choose file</label>
            </div>
        </div>
        @isset($project)
            <p class="text-muted mt-1 mb-3">Selecting new images will remove the old ones</p>
        @endisset
        <button type="submit" class="btn btn-primary">
            @isset($project)
                Edit
            @else
                Add
            @endisset
        </button>
        @isset($project)
            <a class="btn btn-danger"
               onclick="return confirm('Are you sure?') && deleteProject()">Delete
            </a>
        @endisset
    </form>
    @isset($project)
        <div class="flex-row">
            @foreach($project->images as $image)
                <img src="{{ asset($image->url) }}" alt="img" style="width: 24%">
            @endforeach
        </div>
        <form action="{{ route('admin.projects.destroy', $project) }}" id="deleteProject" method="post">
            @csrf
            @method('delete')
        </form>
    @endisset
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
        $(document).ready(function () {
            $('#description').summernote({
                height : 300,
                toolbar: ''
            });
            $('.select').select2();
        });

        const deleteProject = () => document.querySelector('#deleteProject').submit()
    </script>
@endsection

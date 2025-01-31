@extends('adminlte::page')

@section('title', isset($project) ? 'Edit project' : 'Add project')

@section('content_header')
    @isset($project)
        <h1>Edit episode</h1>
    @else
        <h1>Add episode</h1>
    @endisset
@stop

@section('content')
    <form method="POST"
          action="{{ isset($ld) ? route('admin.ld.update', $ld) : route('admin.ld.store') }}"
          enctype="multipart/form-data">
        @csrf
        @isset($ld)
            @method('put')
        @endisset
        <div class="form-group">
            <label for="number">Number</label>
            <input type="number"
                   @class([
		                'form-control',
                        'is-invalid' => $errors->has('number')
                   ])
                   id="number"
                   aria-describedby="number"
                   name="number"
                   placeholder="Enter number"
                   value="{{ old('number', $ld->number ?? $latest_number ?? 0) }}"
                   required>
        </div>
        <div class="form-group">
            <label for="guest">Guest</label>
            <input type="text"
                   @class([
		                'form-control',
                        'is-invalid' => $errors->has('guest')
                   ])
                   id="guest"
                   aria-describedby="guest"
                   name="guest"
                   placeholder="Enter guest"
                   value="{{ old('guest', $ld->guest ?? '') }}"
                   required>
        </div>
        <div class="form-group">
            <label for="soundcloud">SoundCloud</label>
            <input type="url"
                   @class([
		                'form-control',
                        'is-invalid' => $errors->has('soundcloud')
                   ])
                   id="soundcloud"
                   aria-describedby="soundcloud"
                   name="soundcloud"
                   value="{{ old('soundcloud', $ld->soundcloud ?? '') }}"
                   placeholder="Enter SoundCloud">
        </div>
        <div class="form-group">
            <div class="form-group">
                <label for="apple_podcasts">Apple Podcasts</label>
                <input type="url"
                       @class([
                            'form-control',
                            'is-invalid' => $errors->has('apple_podcasts')
                       ])
                       id="apple_podcasts"
                       aria-describedby="apple_podcasts"
                       name="apple_podcasts"
                       value="{{ old('apple_podcasts', $ld->apple_podcasts ?? '') }}"
                       placeholder="Enter Apple Podcasts">
            </div>
            <div class="form-group">
                <label for="hypeddit">Hypeddit</label>
                <input type="url"
                       @class([
                            'form-control',
                            'is-invalid' => $errors->has('hypeddit')
                       ])
                       id="hypeddit"
                       aria-describedby="hypeddit"
                       name="hypeddit"
                       value="{{ old('hypeddit', $ld->hypeddit ?? '') }}"
                       placeholder="Enter Hypeddit">
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"
                          id="artwork">Artwork</span>
                </div>
                <div class="custom-file">
                    <input type="file"
                           @class([
                                'custom-file-input',
                                'is-invalid' => $errors->has('artwork')
                           ])
                           id="artwork"
                           aria-describedby="artwork"
                           name="artwork"
                           accept="image/jpeg">
                    <label class="custom-file-label"
                           for="artwork">Choose file
                    </label>
                </div>
            </div>
            <button type="submit"
                    class="btn btn-primary">
                @isset($ld)
                    Edit
                @else
                    Add
                @endisset
            </button>
            @isset($ld)
                <a class="btn btn-danger"
                   onclick="return confirm('Are you sure?') && deleteEpisode()">Delete
                </a>
        @endisset
    </form>
    @isset($ld)
        <div class="flex-row">
            <img src="{{ asset("storage/artwork/{$ld->id}.jpg") }}"
                 alt="img"
                 style="width: 24%">
        </div>
        <form action="{{ route('admin.ld.destroy', $ld) }}"
              id="deleteEpisode"
              method="post">
            @csrf
            @method('delete')
        </form>
    @endisset
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css"
          rel="stylesheet" />
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        const deleteEpisode = () => document.querySelector('#deleteEpisode').submit()
    </script>
@endsection

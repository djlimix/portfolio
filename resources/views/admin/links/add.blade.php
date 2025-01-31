@extends('adminlte::page')

@section('title', isset($link) ? 'Edit link' : 'Add link')

@section('content_header')
    <h1>{{ isset($link) ? 'Edit link' : 'Add link' }}</h1>
@stop

@section('content')
    <form method="POST" action="{{ isset($link) ? route('admin.links.update', $link) : route('admin.links.store') }}">
        @csrf
        @isset($link)
            @method('put')
        @endisset
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text"
                   @class([
		                'form-control', 'is-invalid' => $errors->has('title')
                   ])
                   id="title"
                   aria-describedby="title"
                   name="title"
                   placeholder="Enter title"
                   required
                   value="{{ old('title', $link->title ?? '') }}">
        </div>
        @error('title')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <div class="form-group">
            <label for="link">Link</label>
            <input type="url"
                   @class([
		                'form-control', 'is-invalid' => $errors->has('url')
                   ])
                   id="link"
                   aria-describedby="url"
                   name="url"
                   placeholder="Enter link"
                   required
                   value="{{ old('url', $link->url ?? '') }}">
        </div>
        @error('url')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <button type="submit" class="btn btn-primary">{{ isset($link) ? 'Edit' : 'Add' }}</button>
        <button class="btn btn-danger"
                type="button"
                onclick="return confirm('Are you sure?') && document.querySelector('#deleteForm').submit()">Delete
        </button>
    </form>
    @isset($link)
        <form action="{{ route('admin.links.destroy', $link) }}" id="deleteForm"
              method="post">
            @csrf
            @method('delete')
        </form>

    @endisset
@stop

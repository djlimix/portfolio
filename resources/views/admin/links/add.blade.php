@extends('adminlte::page')

@section('title', isset($link) ? 'Edit link' : 'Add link')

@section('content_header')
    <h1>{{ isset($link) ? 'Edit link' : 'Add link' }}</h1>
@stop

@section('content')
    <form method="POST" action="{{ url()->current() }}">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" aria-describedby="title" name="title" placeholder="Enter title" required value="{{ isset($link) ? $link->title : old('title') }}">
        </div>
        <div class="form-group">
            <label for="for">For</label>
            <select name="for" id="for" class="form-control">
                <option value="dj" @if(old('for') === 'dj' || (isset($link) && $link->for === 'dj') || (isset($type) && $type === 'dj')) selected @endif>DJ LiMix</option>
                <option value="media" @if(old('for') === 'media' || (isset($link) && $link->for === 'media') || (isset($type) && $type === 'media')) selected @endif>LiMix Media</option>
            </select>
        </div>
        <div class="form-group">
            <label for="link">Link</label>
            <input type="url" class="form-control" id="link" aria-describedby="link" name="link" placeholder="Enter link" required value="{{ isset($link) ? $link->url : old('link') }}">
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($link) ? 'Edit' : 'Add' }}</button>
        @if(isset($link))
            <a href="{{ route(($link->for === 'dj' ? 'admin.dj.links.delete' : 'admin.media.links.delete'), $link) }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
        @endif
    </form>
@stop

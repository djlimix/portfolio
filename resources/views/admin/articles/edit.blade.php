@extends('adminlte::page')

@section('title', 'Edit article ' . $article->title)

@section('content_header')
    <h1>{{ $article->title  }}</h1>
    <img src="{{ $article->thumb }}" alt="thumb" style="width: 100%">
@stop

@section('content')
    <form method="POST" action="{{ route('admin.articles.edit', $article) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" aria-describedby="title" name="title" placeholder="Enter title" value="{{ $article->title }}" required>
        </div>
        <div class="form-group">
            <label for="text">Content</label>
            <textarea name="text" id="text" class="form-group" required>{{ $article->text }}</textarea>
        </div>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="bg">Background</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="bg" aria-describedby="bg" name="bg" accept="image/*">
                <label class="custom-file-label" for="bg">Choose file</label>
            </div>
        </div>
        <div class="form-group">
            <label for="select">Tags</label>
            <select name="tags[]" id="select" multiple class="form-control" required>
                @forelse($tags as $tag)
                    <option value="{{ $tag->title }}"
                    @if(in_array_r($tag->id, $article->tags->toArray()))
                        selected
                    @endif
                    >{{ $tag->title }}</option>
                @empty

                @endforelse
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="{{ route('admin.articles.delete', $article) }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
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
        $.ajax({
            url: 'https://api.github.com/emojis',
            async: false
        }).then(function(data) {
            window.emojis = Object.keys(data);
            window.emojiUrls = data;
        });

        $(document).ready(function() {
            $('#text').summernote({
                height: 300,
                hint: {
                    match   : /:([\-+\w]+)$/,
                    search  : function (keyword, callback) {
                        callback($.grep(emojis, function (item) {
                            return item.indexOf(keyword) === 0;
                        }));
                    },
                    template: function (item) {
                        var content = emojiUrls[item];
                        return '<img src="' + content + '" width="20" /> :' + item + ':';
                    },
                    content : function (item) {
                        var url = emojiUrls[item];
                        if (url) {
                            return $('<img />').attr('src', url).css('width', 20)[0];
                        }
                        return '';
                    }
                }
            });
            $('#select').select2({
                tags: true
            });
        });
    </script>
@endsection

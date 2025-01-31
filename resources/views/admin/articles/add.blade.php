@extends('adminlte::page')

@section('title', 'Add article')

@section('content_header')
    <h1>Add article</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('admin.articles.add') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text"
                   class="form-control"
                   id="title"
                   aria-describedby="title"
                   name="title"
                   placeholder="Enter title"
                   required>
        </div>
        <div class="form-group">
            <label for="text">Content</label>
            <textarea name="text" id="text" class="form-group" required></textarea>
        </div>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="bg">Background</span>
            </div>
            <div class="custom-file">
                <input type="file"
                       class="custom-file-input"
                       id="bg"
                       aria-describedby="bg"
                       name="bg"
                       accept="image/*"
                       required>
                <label class="custom-file-label" for="bg">Choose file</label>
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
        $.ajax({
            url  : 'https://api.github.com/emojis',
            async: false
        }).then(function (data) {
            window.emojis = Object.keys(data);
            window.emojiUrls = data;
        });
        ;

        $(document).ready(function () {
            $('#text').summernote({
                height: 300,
                hint  : {
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
        });
    </script>
@endsection

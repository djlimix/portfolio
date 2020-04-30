@extends('adminlte::page')

@section('title', 'Articles')

@section('content_header')
    <h1>Articles</h1>
@stop

@section('content')
    <table id="table">
        <thead>
            <tr>
                <td>#</td>
                <td>Title</td>
                <td>Views</td>
                <td>Created at</td>
            </tr>
        </thead>
        <tbody>
            @forelse($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td><a href="{{ route('admin.articles.edit', $article) }}">{{ $article->title }}</a></td>
                    <td>{{ $article->views }}</td>
                    <td>{{ $article->published }}</td>
                </tr>
            @empty
                There are no articles available.
            @endforelse
        </tbody>
    </table>
@stop

@section('plugins.Datatables', true)

@section('js')
    <script>
        $(document).ready( function () {
            $('#table').DataTable({
                "order": [[ 0, "desc" ]]
            });
        } );
    </script>
@endsection

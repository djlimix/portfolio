@extends('adminlte::page')

@section('title', 'Links')

@section('content_header')
    <h1>Links</h1>
@stop

@section('content')
    <table id="table">
        <thead>
            <tr>
                <td>#</td>
                <td>Title</td>
                <td>To</td>
                <td>Created at</td>
            </tr>
        </thead>
        <tbody>
            @forelse($links as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td><a href="{{ $row->type === 'dj' ? route('admin.dj.links.edit', $row) : route('admin.media.links.edit', $row) }}">{{ $row->title }}</a></td>
                    <td>{{ $row->url }}</td>
                    <td>{{ $row->published }}</td>
                </tr>
            @empty
                There are no links available.
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

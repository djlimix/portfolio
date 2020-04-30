@extends('adminlte::page')

@section('title', 'Production')

@section('content_header')
    <h1>Production</h1>
@stop

@section('content')
    <table id="table">
        <thead>
            <tr>
                <td>#</td>
                <td>Title</td>
                <td>Type</td>
                <td>Year</td>
                <td>Created at</td>
            </tr>
        </thead>
        <tbody>
            @forelse($production as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td><a href="{{ route('admin.production.edit', $row) }}">{{ $row->title }}</a></td>
                    <td>{{ $row->type }}</td>
                    <td>{{ $row->year }}</td>
                    <td>{{ $row->published }}</td>
                </tr>
            @empty
                There is no production available.
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

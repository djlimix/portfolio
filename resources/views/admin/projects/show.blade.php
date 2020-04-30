@extends('adminlte::page')

@section('title', 'Projects')

@section('content_header')
    <h1>Projects</h1>
@stop

@section('content')
    <table id="table">
        <thead>
            <tr>
                <td>#</td>
                <td>Title</td>
                <td>Year</td>
                <td>Created at</td>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td><a href="{{ route('admin.projects.edit', $project) }}">{{ $project->title }}</a></td>
                    <td>{{ $project->year }}</td>
                    <td>{{ $project->published }}</td>
                </tr>
            @empty
                There are no projects available.
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

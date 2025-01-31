@extends('adminlte::page')

@section('title', 'Episodes')

@section('content_header')
    <h1>Episodes</h1>
@stop

@section('content')
    <table id="table" class="table table-striped" style="width:100%">
        <thead>
        <tr>
            <td>#</td>
            <td>Guest</td>
            <td>Soundcloud</td>
            <td>Google Podcasts</td>
            <td>Apple Podcasts</td>
            <td>Download</td>
            <td>Created at</td>
        </tr>
        </thead>
        <tbody>
        @foreach($episodes as $episode)
            <tr>
                <td>{{ $episode->id }}</td>
                <td>
                    <a href="{{ route('admin.ld.edit', $episode) }}">{{ $episode->guest }}</a>
                </td>
                <td>{{ $episode->soundcloud }}</td>
                <td>{{ $episode->google_podcasts }}</td>
                <td>{{ $episode->apple_podcasts }}</td>
                <td>{{ $episode->hypeddit }}</td>
                <td>{{ $episode->created_at->diffForHumans() }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

@section('plugins.Datatables', true)

@section('js')
    <script>
        $(document).ready(function () {
            $('#table').DataTable({
                "order": [[0, "desc"]]
            });
        });
    </script>
@endsection

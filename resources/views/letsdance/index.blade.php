@extends('layouts.app')

@section('content')
    <section>
        <h1>
            Let's Dance by LiMix
        </h1>

        <img src="{{ Vite::asset('resources/images/dj_logo_dark.png') }}"
             alt="dj logo"
             class="artwork dark_logo">

        <img src="{{ Vite::asset('resources/images/dj_logo_light.png') }}"
             alt="dj logo"
             class="artwork light_logo">

        <div class="links">
            @foreach($episodes as $episode)
                <div class="link">
                    <a href="{{ route('ld.show', $episode->number) }}">
                        Let's Dance {{ $episode->number }}<br> Guest Mix by {{ $episode->guest }}
                    </a>
                </div>
            @endforeach
        </div>
    </section>
@endsection

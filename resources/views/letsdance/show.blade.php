@extends('layouts.app')

@section('title', 'Let\'s Dance '. $ld->number .' - Guest Mix by '. $ld->guest .' - made by DJ LIMIX')

@section('content')
    <section>
        <h1>
            Let's Dance {{ $ld->number }} by
            <a href="{{ route('home') }}">DJ LiMix</a>
        </h1>
        <h1>
            Guest Mix by {{ $ld->guest }}
        </h1>

        <img src="{{ asset("storage/artwork/{$ld->id}.jpg") }}"
             alt="artwork"
             class="artwork">

        <div class="links">
            <div class="link">
                <a href="{{ url($ld->soundcloud) }}"
                   target="_blank">
                    SoundCloud
                </a>
            </div>
            <div class="link">
                <a href="{{ url($ld->apple_podcasts) }}"
                   target="_blank">
                    Apple Podcasts
                </a>
            </div>
        </div>
    </section>
@endsection

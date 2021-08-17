@extends('layouts.app')

@section('title', 'Maximilián Csank')

@section('desc', 'Maximilián Csank creates products that shout quality and speak efficiency.')

@section('img', asset('img/screenshot.png'))

@section('content')
    <section class="big__text" data-scroll-section="">
        <h1 class="big__text--scroll">
            <div>
                <span data-scroll data-scroll-position="top">M</span>
                <span data-scroll data-scroll-position="top" data-scroll-speed="2">a</span>
                <span data-scroll data-scroll-position="top" data-scroll-speed="3">x</span>
                <span data-scroll data-scroll-position="top" data-scroll-speed="4">i</span>
                <span data-scroll data-scroll-position="top" data-scroll-speed="5">m</span>
                <span data-scroll data-scroll-position="top" data-scroll-speed="6">i</span>
                <span data-scroll data-scroll-position="top" data-scroll-speed="7">l</span>
                <span data-scroll data-scroll-position="top" data-scroll-speed="8">i</span>
                <span data-scroll data-scroll-position="top" data-scroll-speed="9">á</span>
                <span data-scroll data-scroll-position="top" data-scroll-speed="10">n</span>
            </div>
            <div>
                <span data-scroll data-scroll-delay="0.05" data-scroll-speed="2" data-scroll-position="top">C</span>
                <span data-scroll data-scroll-delay="0.05" data-scroll-speed="3" data-scroll-position="top">s</span>
                <span data-scroll data-scroll-delay="0.05" data-scroll-speed="4" data-scroll-position="top">a</span>
                <span data-scroll data-scroll-delay="0.05" data-scroll-speed="5" data-scroll-position="top">n</span>
                <span data-scroll data-scroll-delay="0.05" data-scroll-speed="6" data-scroll-position="top">k</span>
            </div>
        </h1>
        <span data-scroll class="big__text__scroll--text">
                    <span data-scroll>scroll down</span>
                </span>
    </section>

    <section class="second__section" data-scroll-section>
        <div id="fixed-elements">
            <div class="second__section--container">
                <div class="second__section__left" data-scroll data-scroll-sticky data-scroll-target="#fixed-elements">
                    <div data-scroll data-scroll-offset="200">
                        <h3 class="second__section__left--big">
                            Who am I?
                        </h3>
                        <div class="second__section__left--small">
                            <p>
                                I'm Max, an 18-year-old web developer from Slovakia.
                            </p>
                            <p>
                                I build products that shout quality and speak efficiency. During my 4 years of coding, I've worked for few big brands, like
                                <a href="https://www.mampici.com/" target="_blank" rel="noreferrer noopenner">MAMPICI</a>
                                .
                            </p>
                            <p>
                                I've also won 3 prizes with 3 different websites in a competition called
                                <a href="https://juniorinternet.sk" target="_blank" rel="noreferrer noopenner">Junior Internet</a>
                                (1st place with
                                <a href="https://infi.sk" target="_blank" rel="noreferrer noopenner">INFI.sk</a>
                                , 3rd place with AstroPhotographia & The Dean's Prize with SlovakiaTreking.sk).
                            </p>
                            <p>
                                Lately, I've also been trying coding cross-platform mobile apps.
                            </p>
                            <p>
                                Currently, I am working on creating my own company called <strong>LiMix Media</strong>, so
                                that I can fully pursue my dreams and make websites and apps which everyone will love.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="second__section__right" data-scroll data-scroll-repeat>
                    <div class="second__section__img"
                         data-scroll
                         data-scroll-sticky
                         data-scroll-speed="2"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="third__section" data-scroll-section>
        <div id="fixed-elements-2">
            <div class="third__section--container">
                <div class="third__section__left">
                    <ul class="third__section__left--list">
                        <li class="third__section__left--client">
                            <a href="https://infi.sk" target="_blank" rel="noreferrer noopenner">INFI.sk</a>
                        </li>
                        <li>
                            <a href="https://seged.in" target="_blank" rel="noreferrer noopenner">seged.ín</a>
                        </li>
                        <li class="third__section__left--client">
                            <a>GYMES intranet</a>
                        </li>
                        <li class="third__section__left--client">
                            <a>VytvorZnačku</a>
                        </li>
                        <li>
                            <a>SlovakiaTreking.sk</a>
                        </li>
                        <li>
                            <a>AstroPhotographia.eu</a>
                        </li>
                        <li class="third__section__left--coming-soon">
                            <a>homophobia.wtf</a>
                        </li>
                    </ul>
                </div>
                <div class="third__section__right" data-scroll data-scroll-sticky data-scroll-target="#fixed-elements-2">
                    <h3 data-scroll data-scroll-offset="200">Work</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="fourth__section" data-scroll-section>
        <div id="fixed-elements-3">
            <div class="fourth__section--container">
                <div class="fourth__section__left" data-scroll data-scroll-sticky data-scroll-target="#fixed-elements-3">
                    <h3 data-scroll data-scroll-offset="200">Writing</h3>
                </div>
                <div class="fourth__section__right">
                    <ul class="fourth__section__right--list">
                        @foreach($articles as $article)
                            <li @class(['fourth__section__right--new' => $article->is_new])>
                                <a href="{{ route('writing', ['slug' => $article->slug]) }}">{{ $article->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

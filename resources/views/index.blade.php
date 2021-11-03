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
                            <a href="javascript:void(0)" onclick="showDescription('infi')">INFI.sk</a>
                        </li>
                        <div class="third__section__left--description" id="infi">
                            INFI.sk is a management software for construction companies. It consists of real-time chat, management of employees, wages, warehouses, parking lots, vehicles and lots more. I've been working on this app since May 2020 and in April 2021, we won 1st prize on a Slovak competition. It's probably the biggest app I've ever made.
                            <a href="https://infi.sk" target="_blank" rel="noreferrer noopenner">open website</a>
                        </div>
                        <li class="third__section__left--client">
                            <a href="javascript:void(0)" onclick="showDescription('vht')">Veľký Hokejbalový Turnaj</a>
                        </li>
                        <div class="third__section__left--description" id="vht">
                            Veľký Hokejbalový Turnaj is a competition in hockeyball that takes place in Košice every year. The current website is the second version of it, and in year 2020, I was supposed to launch version 3, which was supposed to make the competition paper-less (everything would be controlled through the app). However, due to COVID-19, the new design has not been finished yet and so 2022 will be the year for the best version of the app.
                            <a href="https://vht.limix.eu" target="_blank" rel="noreferrer noopenner">open website</a>
                        </div>
                        <li class="third__section__left--sideproject--disc">
                            <a href="javascript:void(0)" onclick="showDescription('segedin')">seged.ín</a>
                        </li>
                        <div class="third__section__left--description" id="segedin">
                            Seged.ín is the best dumb image generator. Are you tired of using dumb images which are plain, with nothing interesting in it? I've got a solution for you - seged.ín! Add images of delicious seged.ín into your websites, templates, app, or anywhere else you want! Trust me, your views will go up! This website also contains URL shortener, which is free to use for everyone. However, if you want to access full features, you'll have to buy the premium account.

                            <a>this project was shut down in November 2021</a>
                        </div>
                        <li class="third__section__left--client">
                            <a href="javascript:void(0)" onclick="showDescription('gymesit')">GYMES intranet</a>
                        </li>
                        <div class="third__section__left--description" id="gymesit">
                            This website is like the intranet for the IT team on our school. It contains every license key we have, a system for managing IP addresses and map of every floor of our school. The system for managing IP addresses shows the MAC address and description linked to the IP address. The maps contain every computer on the selected floor (including information about computers, like CPU, GPU, storage, MAC address, etc) and every AP/router on the floor. The website is available in two modes - light and dark mode. The selected mode of a user is saved into the database, so that wherever the user logs in, in shows the correct mode. Users can log into the website using their Google school accounts.
                        </div>
                        <li class="third__section__left--client">
                            <a href="javascript:void(0)" onclick="showDescription('vz')">VytvorZnačku</a>
                        </li>
                        <div class="third__section__left--description" id="vz">
                            VytvorZnačku was a step-by-step course made by CEO of famous brand in Slovakia called MamPici. This website contained videos, exercises and many other features which were supposed to be added later. We also made a simple admin panel in which you were able to approve answers of visitors.
                        </div>
                        <li>
                            <a href="javascript:void(0)" onclick="showDescription('skt')">SlovakiaTreking.sk</a>
                        </li>
                        <div class="third__section__left--description" id="skt">
                            Because of the success of Astrophotographia.eu, we contacted the winner of JuniorInternet 2017 to make a website. SlovakiaTreking is the result. This website was an alternative to slovakia.travel. The main purpose of this website was to enter the competition (again). Visitors of SlovakiaTreking were able to create free account and add hikes or touristical advices. However, it never gained any success and slowly died too.
                        </div>
                        <li>
                            <a href="javascript:void(0)" onclick="showDescription('astro')">AstroPhotographia.eu</a>
                        </li>
                        <div class="third__section__left--description" id="astro">
                            I have many hobbies. Astrophotography was one of them (for some time). We decided to create a website, where we would upload our photos of stars, planets, etc. People were also able to buy any photo they wanted for price of 1€. However, we stopped visiting the observatory in our town and this website slowly died. Only Facebook page is still available.
                        </div>
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

@extends('layouts.master')
@section('heading')
    <title>FLASH Club Brussels - Events</title>
    <link href="{{ asset('css/event.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.css">
    
    
    @endsection

@section('content')

    {{-- TEMPLATE FOUND ON: https://technext.github.io/eventcon/Program.html, credits to Colorylib <3 --}}
<div class="cover-item active text-white">

    <div class="program_details_area cover-item  cover-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div data-aos="fade-down-right" class="section_title text-center">
                        <h3>{{ __('Our Upcoming Events')}}</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="program_detail_wrap">
                        
                    @foreach ($events as $event)
                    @if($event->date >= Date('Y-m-d'))
                        <div data-aos="zoom-in" class="single_propram">
                            <div class="inner_wrap">
                                <div class="circle_img"></div>
                                <div class="porgram_top">
                                    <span>{{ $event->theme }}</span>
                                    <h4> @php 
                                        $datum = date('l', strtotime($event->date));
                                        $datumske = \Carbon\Carbon::parse($datum)->locale(session()->get('locale'));
                                        echo ucfirst($datumske->translatedFormat('l'));
                                        @endphp
                                        {{ date('d/m/Y', strtotime($event->date)) }}, </h4>
                                    <h4>{{ date('H:i', strtotime($event->start)) }} - {{ date('H:i', strtotime($event->end)) }}</h4>
                                    <p>{{ $event->description }}</p>
                                    <p>DJ('s):<ul class="list-group list-group-flush">
                                        <?php
                                        $djss = json_decode($event->dj);
                                        foreach ($djss as $dj) {
                                            echo "<li class=\" m-0 py-1 list-group-item bg-transparent\">"."-".$dj."</li>";
                                        }
                                        ?></p>
                                        </ul>
                                </div>
                                <div class="thumb">
                                    <img src="{{ URL("media/events/" . $event->picture) }}" alt="">
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






@endsection

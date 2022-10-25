@extends('layouts.master')
@section('heading')
    <title>FLASH Club Brussels - Gallery</title>
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}">
@endsection

@section('content')

<div class="container gallery-container text-white">

    <h1 data-aos="fade-right" class="pt-4">{{ __('Go see our last added Albums') }}</h1>

    <div class="tz-gallery">
        <div class="row">
            
            {{-- https://stackoverflow.com/questions/18322548/black-transparent-overlay-on-image-hover-with-only-css --}}
            @foreach ($albums->slice(0, 3) as $album)
            <div class="col-sm-12 col-md-4 album" data-content="{{ $album->name }}">
                    <a  class="lightbox" href="{{ route("gallery.album", $album->id) }}">
                        <img class="my-0" data-aos="zoom-in"  src="{{ URL("media/gallery/".str_replace(' ', '-', $album->name)."/".$album->cover) }}" alt="{{ $album->name }}">
                    </a>
            </div>
            @endforeach

        </div>

        
        <h1  data-aos="fade-left" class="pt">{{ __('Must see albums') }}</h1>
        <div class="row">
            @foreach ($albums->slice(0, 9) as $album)
            @if ($album->important) 
                <div class="col-sm-12 col-md-4">
                    <a  class="lightbox" href="{{ route("gallery.album", $album->id) }}">
                        <img data-aos="zoom-out" src="{{ URL("media/gallery/".str_replace(' ', '-', $album->name)."/".$album->cover) }}" alt="{{ $album->name }}">
                    </a>
                </div>
            @endif
            @endforeach
        </div>
        <h1 data-aos="fade-right" class="">{{ __('Other Albums') }}</h1>
        <div class="row">
            @foreach ($albums->slice(3, 12) as $album)
            @if (!$album->important) 
            <div class="col-sm-12 col-md-4">
                    <a  class="lightbox" href="{{ route("gallery.album", $album->id) }}">
                        <img data-aos="zoom-in" src="{{ URL("media/gallery/".str_replace(' ', '-', $album->name)."/".$album->cover) }}" alt="{{ $album->name }}">
                    </a>
            </div>
            @endif
            @endforeach
        </div>
    </div>

</div>


@endsection
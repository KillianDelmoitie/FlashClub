@extends('layouts.master')
@section('heading')
    <title>FLASH Club Brussels - Gallery</title>
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}">
@endsection

@section('content')

<div class="container gallery-container text-white">

    <h1 class="pt-4"><a style="text-decorations:none; color:inherit;" href="{{ URL($album->fb) }}">{{ $album->name }}</a> </h1>

    <div class="tz-gallery">

        <div class="row">
            @foreach ($pictures as $picture)
            <div class="col-sm-12 col-md-4">
                <a class="lightbox" href="{{ URL("media/gallery/".str_replace(' ','-',$album->name)."/".$picture->picture) }}">
                    <img src="{{ URL("media/gallery/".str_replace(' ','-',$album->name)."/".$picture->picture) }}" alt="">
                </a>
            </div>
            @endforeach

        </div>
        <p>{{ __('You want to see more pics of that night? Go take a look on ') }} <a href="{{ URL($album->fb) }}">Facebook</a>!</p>
    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>

@endsection
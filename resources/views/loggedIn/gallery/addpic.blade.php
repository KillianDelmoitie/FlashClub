@extends('layouts.dash')
@section('heading')
    <title>FLASH Club Brussels - Admin Dashboard</title>
@endsection


@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $album->name }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <a href="{{ route('gallerymanaging') }}" class="btn btn-sm btn-primary">Retour</a>
            </div>
          </div>
      </div>
    </div>

        <form action="{{ route('addpictures', $album->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="albumid" value="{{ $album->id }}"/>
            <input type="hidden" name="albumname" value="{{ $album->name }}"/>
            <div class="form-group row">
                <label for="cover_image" class="col-sm-2 col-form-label">Photos</label>
                <div class="col-sm-10">
                    <input type="file" name="pictures[]" id="picture" multiple>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-success btn-sm">Ajouter photos</button>
            </div>
        </form>
    <hr>
    <style>
        .tz-gallery {
            padding: 40px;
        }

        .tz-gallery .lightbox img {
            width: 75%;
            height: 75%;
            margin-bottom: 30px;
            transition: 0.2s ease-in-out;
            box-shadow: 0 2px 3px rgba(0,0,0,0.2);
        }


        .tz-gallery .lightbox img:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 15px rgba(0,0,0,0.3);
        }
        .tz-gallery .lightbox img:after {
            transform: scale(1.05);
            box-shadow: 0 8px 15px rgba(0,0,0,0.3);
        }

        .tz-gallery img {
            border-radius: 4px;
        }

        .baguetteBox-button {
            background-color: transparent !important;
        }



        @media(max-width: 768px) {
            body {
                padding: 0;
            }

            .container.gallery-container {
                border-radius: 0;
            }
        }
    </style>
    <div class="tz-gallery">

        <div class="row">
            @foreach ($pictures as $picture)
            <div class="col-sm-12 col-md-4">
                <div class="lightbox">
                    <form action="{{ route('delete.picture',$picture->id) }}" method="post">
                        @method('POST')
                        @csrf
                        <input required type="hidden" name="albumid" value="{{ $album->id }}"/>
                        <img src="{{ URL('media/gallery/'. $album->date . '_' . str_replace(' ', '-', $album->name).'/'.$picture->picture) }}" alt="">
                        <button type="submit" class="close" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                </form>
                </div>
            </div>
            @endforeach
        </div>

  </main>
@endsection

@extends('layouts.dash')
@section('heading')
    <title>FLASH Club Brussels - Admin Dashboard</title>
@endsection


@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">Edit cet Album: {{ $album->name }}</h1>
    </div>
    </div>
    <form action="{{ route('update.Album', $album->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="vraag" >Nom de la soirée</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control form-control-lg" value="{{ $album->name }}" required autofocus/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="vraag" >Date de la soirée</label>
            <div class="col-sm-10">
                <input type="date" name="date" class="form-control form-control-lg"  value="{{ $album->date }}" required autofocus/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="vraag" >Mettre dans "must see"</label>
            <div class="col-sm-10">
                  <select class="custom-select" name="important" id="inputGroupSelect02" required>
                    <option value="" selected>Choisi...</option>
                    <option value="1" @if($album->important) echo selected @endif>Oui</option>
                    <option value="0" @if(!($album->important)) echo selected @endif>Non</option>
                  </select>
            </div>
        </div>
            
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="vraag" >Lien Album Facebook</label>
            <div class="col-sm-10">
                <input type="text" name="fb" class="form-control form-control-lg" value="{{ $album->fb }}" required autofocus/>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-success btn-sm">Edit Album</button>
        </div>
    </form>
  </main>
@endsection
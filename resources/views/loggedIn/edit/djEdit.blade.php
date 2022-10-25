@extends('layouts.dash')
@section('heading')
    <title>FLASH Club Brussels - Admin Dashboard</title>
@endsection


@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">Update ce DJ: {{ $dj->name }}</h1>
    </div>
    </div>
    <form action="{{ route('dj.update', $dj->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="vraag" >Nom</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control form-control-lg"  value="{{ $dj->name }}" required autofocus/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="vraag" >Description</label>
            <div class="col-sm-10">
                <textarea name="description" class="form-control form-control-lg"  required autofocus rows="2" cols="50">{{ $dj->description }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="vraag" >Priorité (100 est le plus haut)</label>
            <div class="col-sm-10">
                <input type="number" name="priority" class="form-control form-control-lg"  value="{{ $dj->priority }}" required autofocus/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="vraag" >Snapchat (lien)</label>
            <div class="col-sm-10">
                <input type="text" name="snapchat" class="form-control form-control-lg" value="{{ $dj->snapchat }}" autofocus/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="vraag" >Instagram (lien)</label>
            <div class="col-sm-10">
                <input type="text" name="instagram" class="form-control form-control-lg"  value="{{ $dj->instagram }}" autofocus/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="vraag" >Facebook (lien)</label>
            <div class="col-sm-10">
                <input type="text" name="facebook" class="form-control form-control-lg" value="{{ $dj->facebook }}" autofocus/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="vraag" >LinkedIn (lien)</label>
            <div class="col-sm-10">
                <input type="text" name="linkedin" class="form-control form-control-lg" value="{{ $dj->linkedin }}" autofocus/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="vraag" >Mix (lien)</label>
            <div class="col-sm-10">
                <input type="text" name="mix" class="form-control form-control-lg"  value="{{ $dj->mix }}" autofocus/>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-success btn-sm">Afficher le DJ</button>
        </div>
    </form>
  </main>
@endsection
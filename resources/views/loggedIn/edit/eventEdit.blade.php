@extends('layouts.dash')
@section('heading')
    <title>FLASH Club Brussels - Admin Dashboard</title>
@endsection


@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">Edit cette event: {{ $event->theme }}</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
          <a href="{{ route('eventmanaging') }}" class="btn btn-sm btn-primary">Retour</a>
        </div>
      </div>
  </div>
    </div>
    </div>
    <form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="vraag">Date</label>
            <div class="col-sm-10">
                <input type="date" @error('date') is-invalid @enderror name="date" class="form-control form-control-lg"  value="{{ $event->date }}" autofocus/>
                @error('date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="vraag" >Start</label>
            <div class="col-sm-10">
                <input type="time" name="start" class="form-control form-control-lg"  value="{{ $event->start }}" required autofocus/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="vraag" >End</label>
            <div class="col-sm-10">
                <input type="time" name="end" class="form-control form-control-lg" value="{{ $event->end }}" required autofocus/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="vraag" >Theme</label>
            <div class="col-sm-10">
                <input type="text" @error('theme') is-invalid @enderror name="theme" value="{{ $event->theme }}" class="form-control form-control-lg"  required autofocus/>
                @error('theme')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="vraag" >Dj's (sélectionne tout ceux de l'event)</label>
            <div class="col-sm-10">
                
              @foreach ($djs as $dj)
              <div class="form-check required">
                  <input class="form-check-input" @error('dj[]') is-invalid @enderror type="checkbox" name="dj[]" value="{{ $dj->name }}" id="{{ $dj->name }}">
                  <label class="form-check-label" for="{{ $dj->name }}">
                    {{ $dj->name }}
                  </label>
                  @error('dj[]')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              @endforeach
    
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="vraag" >Description</label>
            <div class="col-sm-10">
                <textarea name="description" @error('description') is-invalid @enderror class="form-control form-control-lg" autofocus rows="4" cols="50">{{ $event->description }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-success btn-sm">Edit Event</button>
        </div>
    </form>
  </main>
@endsection
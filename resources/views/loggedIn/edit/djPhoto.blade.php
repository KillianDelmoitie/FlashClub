@extends('layouts.dash')
@section('heading')
    <title>FLASH Club Brussels - Admin Dashboard</title>
@endsection


@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">Edit photo de couverture pour: {{ $dj->name }}</h1>
    </div>
    </div>
    <form action="{{ route('dj.updatephoto', $dj->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="cover_image" class="col-sm-2 col-form-label">Photo</label>
            <div class="col-sm-10">
                <input type="file" name="picture" id="picture">
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-success btn-sm">Changer photo</button>
        </div>
    </form>
  </main>
@endsection
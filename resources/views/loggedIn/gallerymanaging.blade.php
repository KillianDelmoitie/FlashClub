@extends('layouts.dash')
@section('heading')
    <title>FLASH Club Brussels - Admin Dashboard</title>
@endsection


@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Albums</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#albumcreate" onclick="openForm()">Créer un nouvel Album</button>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Nom Event</th>
              <th>Date</th>
              <th>Must see?</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($albums as $album)
                  <tr>
                      <td>{{ $album->name }}</td>
                      <td>{{ $album->date }}</td>
                      @if ($album->important)
                      <td><strong>OUI</strong></td>
                      @else
                      <td>Non</td>
                      @endif
                      <td>

                        <div class="btn-group">
                            <form action="{{ route('addpic',$album->id) }}" method="post">
                                @method('GET')
                                @csrf
                                <input type="hidden" name="albumid" value="{{ $album->id }}"/>
                                <button type="submit" class="btn btn-primary text-white btn-sm">Ajouter photos</button>
                            </form>
{{-- 
                            <form action="{{ route('edit.album',$album->id) }}" method="post">
                                @method('GET')
                                @csrf
                                <button type="submit" class="btn btn-warning text-white btn-sm">Edit album</button>
                            </form>
                            <form action="{{ route('edit.cover',$album->id) }}" method="post">
                                @method('GET')
                                @csrf
                                <button type="submit" class="btn btn-info text-white btn-sm">Changer couverture</button>
                            </form> --}}
                            <form action="{{ route('delete.album',$album->id) }}" method="post">
                                @method('POST')
                                @csrf
                                <button type="submit" class="btn btn-danger text-white btn-sm show_confirm" >Delete album</button>
                            </form>
                        </div>
                        </td>
                  </tr>
              @endforeach
          </tbody>

        </table>
      </div>


    <div class="modal fade" id="albumcreate" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="demoModalLabel">Créer un nouvel Album</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('gallerypost') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="vraag" >Nom de la soirée</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control form-control-lg"  required autofocus/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="vraag" >Date de la soirée</label>
                            <div class="col-sm-10">
                                <input type="date" name="date" class="form-control form-control-lg"  required autofocus/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="vraag" >Mettre dans "must see"</label>
                            <div class="col-sm-10">
                                  <select class="custom-select" name="important" id="inputGroupSelect02" required>
                                    <option value="" selected>Choisi...</option>
                                    <option value="1">Oui</option>
                                    <option value="0">Non</option>
                                  </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cover_image" class="col-sm-2 col-form-label">Photo de couverture (format max: 2000x1100)</label>
                            <div class="col-sm-10">
                                <input type="file" name="cover" id="picture" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="vraag" >Lien Album Facebook</label>
                            <div class="col-sm-10">
                                <input type="text" name="fb" class="form-control form-control-lg"  required autofocus/>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-success btn-sm">Créer Album</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

  </main>
@endsection

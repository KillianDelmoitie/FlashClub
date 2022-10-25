@extends('layouts.dash')
@section('heading')
    <title>FLASH Club Brussels - Admin Dashboard</title>
@endsection

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">Nos DJ's</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
          <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#eventcreate" onclick="openForm()">Afficher un nouveau DJ</button>
        </div>
      </div>
    </div>


    
    <div class="table-responsive">
        <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Priorité</th>
            <th>Snap</th>
            <th>Insta</th>
            <th>Linkedin</th>
            <th>FB</th>
            <th>Mix</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($djs as $dj)
                <tr>
                    <td>{{ $dj->name }}</td>
                    <td>{{ $dj->description }}</td>
                    <td>{{ $dj->priority }}</td>
                    @if(empty($dj->snapchat))
                        <td></td>
                    @else
                        <td>X</td>
                    @endif
                    @if(empty($dj->instagram))
                        <td></td>
                    @else
                        <td>X</td>
                    @endif
                    @if(empty($dj->linkedin))
                        <td></td>
                    @else
                        <td>X</td>
                    @endif
                    @if(empty($dj->facebook))
                        <td></td>
                    @else
                        <td>X</td>
                    @endif
                    @if(empty($dj->mix))
                        <td></td>
                    @else
                        <td>X</td>
                    @endif
                    <td>
                        <div class="btn-group">
                            <form action="{{ route('dj.edit',$dj->id) }}" method="post">
                                @method('GET')
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                            </form>
                            <form action="{{ route('dj.editphoto',$dj->id) }}" method="post">
                                @method('GET')
                                @csrf
                                <button type="submit" class="btn btn-info btn-sm">Photo</button>
                            </form>
                            <form action="{{ route('dj.delete',$dj->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm show_confirm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>

      </table>
    </div>


    <div class="modal fade" id="eventcreate" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="demoModalLabel">Afficher un nouveau DJ</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
						</div>
						<div class="modal-body">
                            <form action="{{ route('djmanaging.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="vraag" >Nom</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control form-control-lg"  required autofocus/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="vraag" >Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" class="form-control form-control-lg"  required autofocus rows="2" cols="50"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="vraag" >Priorité (100 est le plus haut)</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="priority" class="form-control form-control-lg"  required autofocus/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cover_image" class="col-sm-2 col-form-label">Photo</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="picture" id="picture">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="vraag" >Snapchat (lien)</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="snapchat" class="form-control form-control-lg" autofocus/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="vraag" >Instagram (lien)</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="instagram" class="form-control form-control-lg" autofocus/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="vraag" >Facebook (lien)</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="facebook" class="form-control form-control-lg" autofocus/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="vraag" >LinkedIn (lien)</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="linkedin" class="form-control form-control-lg" autofocus/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="vraag" >Mix (lien)</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="mix" class="form-control form-control-lg" autofocus/>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-success btn-sm">Afficher le DJ</button>
                                </div>
                            </form>
						</div>
					</div>
				</div>
			</div>
  </main>

@endsection

@extends('layouts.dash')
@section('heading')
    <title>FLASH Club Brussels - Admin Dashboard</title>
@endsection


@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">Events à Venir</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
          <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#eventcreate" onclick="openForm()">Créer un nouvel event</button>
        </div>
      </div>
    </div>

    
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>Date</th>
            <th>Heure d'ouverture</th>
            <th>Heure de fermeture</th>
            <th>Theme</th>
            <th>Dj's</th>
            <th>Description</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            @if($event->date >= Date('Y-m-d'))
                <tr>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->start }}</td>
                    <td>{{ $event->end }}</td>
                    <td>{{ $event->theme }}</td>
                    <td><ul class="list-group">
                      <?php
                      $djss = json_decode($event->dj);
                      foreach ($djss as $dj) {
                          echo "<l>".'-'.$dj."</l>";
                      }
                      ?>
                      </ul></td>
                    <td>{{ $event->description }}</td>
                    <td>
                      <div class="btn-group">
                        <form action="{{ route('event.edit',$event->id) }}" method="post">
                          @method('GET')
                          @csrf
                          <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                        </form>
                        <form action="{{ route('event.editphoto',$event->id) }}" method="post">
                          @method('GET')
                          @csrf
                          <button type="submit" class="btn btn-secondary btn-sm">Photo</button>
                        </form>
                        <form action="{{ route('event.delete',$event->id) }}" method="post">
                          @csrf
                          <button type="submit"  class=" show_confirm btn btn-danger btn-sm show_confirm">Delete</button>
                        </form>
                      </div>
                    </td>
                </tr>
                @endif
            @endforeach
        </tbody>
        
      </table>
    </div>


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Tout les Events (archives)</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>
  
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Date</th>
              <th>Heure d'ouverture</th>
              <th>Heure de fermeture</th>
              <th>Theme</th>
              <th>Dj's</th>
              <th>Description</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($events as $event)
                  <tr>
                      <td>{{ $event->date }}</td>
                      <td>{{ $event->start }}</td>
                      <td>{{ $event->end }}</td>
                      <td>{{ $event->theme }}</td>
                      <td><ul class="list-group">
                        <?php
                        $djss = json_decode($event->dj);
                        foreach ($djss as $dj) {
                            echo "<l>".'-'.$dj."</l>";
                        }
                        ?>
                        </ul></td>
                      <td>{{ $event->description }}</td>
                      <td>
                        <div class="btn-group">
                          <form action="{{ route('event.edit',$event->id) }}" method="post">
                            @method('GET')
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                          </form>
                          <form action="{{ route('event.editphoto',$event->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-secondary btn-sm">Photo</button>
                          </form>
                          <form action="{{ route('event.delete',$event->id) }}" method="post">
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
							<h5 class="modal-title" id="demoModalLabel">Créer un nouvel event</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
						</div>
						<div class="modal-body">
                            <form action="{{ route('eventstore') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="vraag" >Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" @error('date') is-invalid @enderror name="date" class="form-control form-control-lg"   autofocus/>
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
                                        <input type="time" name="start" class="form-control form-control-lg"  value ='22:30' required autofocus/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="vraag" >End</label>
                                    <div class="col-sm-10">
                                        <input type="time" name="end" class="form-control form-control-lg" value ='05:00' required autofocus/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="vraag" >Theme</label>
                                    <div class="col-sm-10">
                                        <input type="text" @error('theme') is-invalid @enderror name="theme" class="form-control form-control-lg"  required autofocus/>
                                        @error('theme')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="vraag" >Dj's</label>
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
                                        <textarea name="description" @error('description') is-invalid @enderror class="form-control form-control-lg"  required autofocus rows="4" cols="50"></textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cover_image" class="col-sm-2 col-form-label">Photo banière (format max: 2000x1100)</label>
                                    <div class="col-sm-10">
                                        <input type="file"  @error('picture') is-invalid @enderror name="picture" id="picture" required>
                                        @error('picture')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-success btn-sm">Créer Event</button>
                                </div>
                            </form>
						</div>
					</div>
				</div>
			</div>
  </main>

  

@endsection

@section('scripts')
<script type="text/javascript">
  @if (count($errors) > 0)
      $('#eventcreate').modal('show');
  @endif
  </script>
@endsection

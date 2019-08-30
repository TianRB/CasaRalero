<div class="row justify-content-center">
  <div class="col-md-10">
    <div class="panel panel-default card">
      <div class="panel-body card-body pt-5">
        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('promos.store') }}">
          {{ csrf_field() }}
          
          <div class="form-group row justify-content-center">
            <label for="name" class="col-md-10 text-left control-label">Titulo</label>
            @if ($errors->has('name'))
            <span class="help-block">
              <small class="text-danger">{{ $errors->first('name') }}</small>
            </span>
            @endif
            <div class="col-md-10">
              <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
          </div>
          
          <div class="form-group row justify-content-center">
            <label for="precio" class="col-md-10 text-left control-label">Precio</label>
            @if ($errors->has('precio'))
            <span class="help-block">
              <small class="text-danger">{{ $errors->first('precio') }}</small>
            </span>
            @endif
            <div class="col-md-10">
              <input id="precio" type="text" class="form-control" name="precio" value="{{ old('precio') }}">
            </div>
          </div>
          
          <div class="form-group-file p-2 row justify-content-center">
            <label for="imagen" class="col-md-10 text-left control-label">Imágen:</label>
            @if ($errors->has('imagen'))
            <span class="help-block">
              <small class="text-danger">{{ $errors->first('imagen') }}</small>
            </span>
            @endif
            <input id="image" name="imagen" type="file" class="file" />
          </div>
          
          <div class="form-group row justify-content-center">
            <div class="col-md-8 text-center">
              <button type="submit" class="btn btn-info">
                Guardar Promoción
              </button>
            </div>
          </div>
          
        </form>
      </div>
    </div>
  </div>
  
</div>

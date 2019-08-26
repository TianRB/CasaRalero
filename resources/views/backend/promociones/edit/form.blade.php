<div class="row justify-content-center">
    
    <div class="col-md-8">
        <div class="panel panel-default card">
            <div class="panel-body card-body pt-4">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('promos/'.$promocion->id) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT" />
                    <div class="form-group row justify-content-center">
                        <label for="name" class="col-md-10 text-left control-label">Titulo</label>
                        @if ($errors->has('name'))
                        <span class="help-block">
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </span>
                        @endif
                        <div class="col-md-10">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $promocion->name }}">
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
                            <input id="precio" type="text" class="form-control" name="precio" value="{{ $promocion->precio }}">
                        </div>
                    </div>
                    
                    <div class="form-group-file p-2 row justify-content-center">
                        <label for="imagen" class="col-md-10 text-left control-label">Nueva imagen, si quieres cambiarla:</label>
                        @if ($errors->has('imagen'))
                        <span class="help-block">
                            <small class="text-danger">{{ $errors->first('imagen') }}</small>
                        </span>
                        @endif
                        <input id="image" name="imagen" type="file" class="file" />
                    </div>
                    
                    <div class="form-group row justify-content-center py-4">
                        <div class="col-md-8 text-center">
                            <button type="submit" class="btn btn-info">
                                Guardar Cambios
                            </button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    
    
</div>


        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default card">
                <div class="panel-heading card-header">Crear Subcategoría</div>

                <div class="panel-body card-body">
                    <form class="form-horizontal" method="POST"  action="{{ route('subcategories.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="nombre" class="col-md-4 control-label">Nombre de la nueva subcategoría</label>
                            @if ($errors->has('nombre'))
                                <span class="help-block">
                                    <small class="text-danger">{{ $errors->first('nombre') }}</small>
                                </span>
                            @endif
                            <div class="col-md-10">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required autofocus>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Enviar
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>


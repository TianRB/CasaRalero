
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default card">
                <div class="panel-heading card-header p-3">Crear imágen de portada</div>

                <div class="panel-body card-body">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('sliders.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="titulo" class="col-md-4 control-label">Título</label>
                            @if ($errors->has('titulo'))
                                <span class="help-block">
                                    <small class="text-danger">{{ $errors->first('titulo') }}</small>
                                </span>
                            @endif
                            <div class="col-md-10">
                                <input id="titulo" type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="activado" class="col-md-4 control-label">Activar imágen en Slider:    {!! Form::checkbox('activado',true) !!}</label>

                        </div> 


                        <div class="form-group-file p-2">
                            <label for="imagen" class="col-md-4 control-label">Imágen:</label>
                            @if ($errors->has('imagen'))
                                <span class="help-block">
                                    <small class="text-danger">{{ $errors->first('imagen') }}</small>
                                </span>
                            @endif
                            <input id="image" name="imagen" type="file" class="file"/>
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


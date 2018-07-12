
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default card">
                <div class="panel-heading card-header p-3">Crear Artículo</div>

                <div class="panel-body card-body">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('articles.store') }}">
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
                            <label for="contenido" class="col-md-4 control-label">Contenido</label>
                            @if ($errors->has('contenido'))
                                <span class="help-block">
                                    <small class="text-danger">{{ $errors->first('contenido') }}</small>
                                </span>
                            @endif
                            <div class="col-md-10">
                                <textarea id="contenido" type="text" class="form-control" name="contenido" value="{{ old('contenido') }}">{{ old('contenido') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="categoria" class="col-md-4 control-label">Categoría:</label>
                            <div class="col-md-10 row">
                                    @foreach($categories as $c)
                                             <div class="col-md-3 category-list p-2">{!! Form::checkbox('categoria[]', $c->id) !!}<small>  {{ $c->name }}  </small></div>
                                    @endforeach
                            </div>
                        </div> 

                        {{--
                        <div class="form-group">
                            <label for="categoria" class="col-md-4 control-label">Categoría:</label>
                            <div class="col-md-10">
                                <select multiple class="form-control" id="sel1" name="categoria[]" value="{{ old('categoria') }}">
                                    @foreach($categories as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> 
                        --}}
                        <div class="form-group">
                            <label for="subcategoria" class="col-md-4 control-label">Subcategoría:</label>
                            <div class="col-md-10 row">
                                @foreach($subcategories as $s)
                                    <div class="col-md-3 subcategory-list p-2">{!! Form::checkbox('subcategoria[]', $s->id) !!}<small>  {{ $s->name }}  </small></div>
                                @endforeach
                            </div>
                        </div>
                        {{--
                        <div class="form-group">
                            <label for="subcategoria" class="col-md-4 control-label">Subcategoría:</label>
                            <div class="col-md-10">
                                <select multiple class="form-control" id="sel1" name="subcategoria[]" value="{{ old('subcategoria') }}">
                                    @foreach($subcategories as $s)
                                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        --}}
                        <div class="form-group-file p-2">
                            <label for="imagen" class="col-md-4 control-label">Imágenes:</label>
                            @if ($errors->has('imagen'))
                                <span class="help-block">
                                    <small class="text-danger">{{ $errors->first('imagen') }}</small>
                                </span>
                            @endif
                            <input id="image" name="imagen[]" type="file" class="file" multiple=""/>
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


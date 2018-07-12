
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default card">
                <div class="panel-heading card-header p-2">Editar Artículo</div>

                <div class="panel-body card-body">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('articles/'.$article->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT" />
                        <div class="form-group">
                            <label for="titulo" class="col-md-4 control-label">Título</label>
                            @if ($errors->has('titulo'))
                                <span class="help-block">
                                    <small class="text-danger">{{ $errors->first('titulo') }}</small>
                                </span>
                            @endif
                            <div class="col-md-10">
                                <input id="titulo" type="text" class="form-control" name="titulo" value="{{ $article->title }}" required autofocus>
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
                                <textarea id="contenido" type="text" class="form-control" name="contenido" value="{{ $article->content }}">{!! $article->content !!}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="categoria" class="col-md-4 control-label">Categoría:</label>
                            <div class="col-md-10">
                                <select class="form-control" id="sel1" name="categoria" value="{{ old('categoria') }}">
                                    @foreach($categories as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subcategoria" class="col-md-4 control-label">Subcategoría:</label>
                            <div class="col-md-10">
                                <select class="form-control" id="sel1" name="subcategoria" value="{{ old('subcategoria') }}">
                                    @foreach($subcategories as $s)
                                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group-file">
                            <label for="imagen" class="col-md-4 control-label">Imágen:</label>
                            @if ($errors->has('imagen'))
                                <span class="help-block">
                                    <small class="text-danger">{{ $errors->first('imagen') }}</small>
                                </span>
                            @endif
                            <input id="image" name="imagen" type="file" class="file">
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


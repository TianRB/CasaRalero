<div class="row justify-content-center">
 <div class="col-md-8">
  <div class="panel panel-default card">
   <div class="panel-body card-body pt-5">
    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('articles.store') }}">
     {{ csrf_field() }}

     <div class="form-group row justify-content-center">
      <label for="titulo" class="col-md-10 text-left control-label">Título</label>
      @if ($errors->has('titulo'))
      <span class="help-block">
                                    <small class="text-danger">{{ $errors->first('titulo') }}</small>
                                </span>
      @endif
      <div class="col-md-10">
       <input id="titulo" type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" required autofocus>
      </div>
     </div>

     <div class="form-group row justify-content-center">
      <label for="contenido" class="col-md-10 text-left  control-label">Contenido</label>
      @if ($errors->has('contenido'))
      <span class="help-block">
          <small class="text-danger">{{ $errors->first('contenido') }}</small>
      </span>
      @endif
      <div class="col-md-10">
       <textarea id="contenido" type="text" class="form-control ckeditor" name="contenido" value="{{ old('contenido') }}">{{ old('contenido') }}</textarea>
      </div>
     </div>

     <div class="form-group row justify-content-center">
      <label for="categoria" class="col-md-10 text-left control-label">Categoría:</label>
      <div class="col-md-10">
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
     <div class="form-group row justify-content-center">
      <label for="subcategoria" class="col-md-10 text-left control-label">Subcategoría:</label>
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
     <div class="form-group-file py-4 row justify-content-center">
      <label for="imagen" class="col-md-10 text-left control-label">Imágenes:</label>
      @if ($errors->has('imagen'))
      <span class="help-block">
                                    <small class="text-danger">{{ $errors->first('imagen') }}</small>
                                </span>
      @endif
      <input id="image" name="imagen[]" type="file" class="file" multiple="" placeholder="Subir Archivos"/>
     </div>

     <div class="form-group row justify-content-center">
      <div class="col-md-8 text-center">
       <button type="submit" class="btn btn-info">
                                    Guardar Artículo
                                </button>
      </div>
     </div>

    </form>
   </div>
  </div>
 </div>
</div>

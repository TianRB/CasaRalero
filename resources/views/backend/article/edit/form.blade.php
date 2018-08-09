<div class="row justify-content-center">

         <div class="col-md-8">
             <div class="panel panel-default card">
                 <div class="panel-body card-body pt-4">
                     <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('articles/'.$article->id) }}">
                         {{ csrf_field() }}
                         <input type="hidden" name="_method" value="PUT" />
                         <div class="form-group row justify-content-center">
                             <label for="title" class="col-md-10 text-left control-label">Título</label>
                             @if ($errors->has('title'))
                                 <span class="help-block">
                                     <small class="text-danger">{{ $errors->first('title') }}</small>
                                 </span>
                             @endif
                             <div class="col-md-10">
                                 <input id="title" type="text" class="form-control" name="title" value="{{ $article->title }}" required autofocus>
                             </div>
                         </div>

                         <div class="form-group row justify-content-center">
                             <label for="contenido" class="col-md-10 text-left control-label">Contenido</label>
                             @if ($errors->has('contenido'))
                                 <span class="help-block">
                                     <small class="text-danger">{{ $errors->first('contenido') }}</small>
                                 </span>
                             @endif
                             <div class="col-md-10">
                                 <textarea id="contenido" type="text" class="form-control ckeditor" name="contenido" value="{{ $article->content }}">{!! $article->content !!}</textarea>
                             </div>
                         </div>

                         <div class="form-group row justify-content-center">
                          <label for="categoria" class="col-md-10 text-left control-label">Categoría:</label>
                          <div class="col-md-10">
                           @foreach($categories as $c)
                           <div class="col-md-3 category-list p-2">{!! Form::checkbox('categoria[]', $c->id, $article->categories->contains($c->id)) !!}<small>  {{ $c->name }}  </small></div>
                           @endforeach
                          </div>
                         </div>

                         <div class="form-group row justify-content-center">
                          <label for="subcategoria" class="col-md-10 text-left control-label">Subcategoría:</label>
                          <div class="col-md-10 row">
                           @foreach($subcategories as $s)
                           <div class="col-md-3 subcategory-list p-2">{!! Form::checkbox('subcategoria[]', $s->id, $article->subcategories->contains($s->id)) !!}<small>  {{ $s->name }}  </small></div>
                           @endforeach
                          </div>
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

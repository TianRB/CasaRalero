<div class="row justify-content-center mt-5">
 <div class="col-md-10">
  <div class="card">
   <div class="card-body p-4">
    <div class="row align-items-start">
     <div class="col-md-4 text-center">
      <div class="article_image" style="background-image:url('@if ($article->pics->count() > 0){{ url($article->one_pic->pluck('path')->pop()) }} @else {{ asset('img/default.jpg') }} @endif');">
      </div>
      <a href="{{route('article.pictures',$article->id)}}" class="btn btn-warning">
       <i class="fas fa-camera-retro"></i>&nbsp;Editar imágenes</a>
     </div>
     <div class="col-md-6">
      <h2>{{$article->title}}</h2>
      {!!$article->content!!}
      <h6>Categorías</h6>
      <p>{{ $article->categories->pluck('name')->implode(', ') }}</p>
      <hr>
      <h6>Subcategorías:</h6>
      <p>{{ $article->subcategories->pluck('name')->implode(', ') }}</p>
     </div>
    </div>
   </div>
   <div class="card-footer">
    <div class="row justify-content-end align-items-center d-flex">
     <a class="btn btn-primary mr-2" href="{{ url('/showArticle/'.$article->id) }}"><i class="fas fa-globe"></i>&nbsp;Ver en sitio</a>
      <a class="btn btn-warning mr-2" href="{{ route('articles.edit',$article->id) }}"><i class="fa fa-edit" /></i>&nbsp;Editar</a>
      <form action="/articles/{{ $article->id }}" method="POST" class="no-margin">
      {{ csrf_field() }}
      <input type="hidden" name="_method" value="DELETE" />
      <button class="btn btn-danger mr-2" type="submit"><i class="fa fa-trash" /></i>&nbsp;Borrar</button>
      </form>
    </div>
   </div>
  </div>
 </div>
</div>

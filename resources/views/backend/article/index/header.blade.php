<div class="panel-header panel-header-md">
 <div class="header text-center">
  <h2 class="title">Artículos @if (isset($category))
   <br><small>Categoría&nbsp;{{$category->name}}</small>
  </h2>
  <div class="row justify-content-center align-items-center">
   <div class="col-md-4 mb-4 m-md-0">
    <p class="category">
  <a class="text-white" href="{{ route('articles.index') }}">
   <i class="fas fa-arrow-left"></i>&nbsp;Volver a listado de articulos</a>
    </p>
   </div>
  </div>
 @else
   </h2>
 @endif
 </div>
</div>

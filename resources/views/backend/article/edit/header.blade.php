<div class="panel-header panel-header-md">
 <div class="header text-center ">
  <h2 class="title">Editar Artículo</h2>
  <a class="text-white" href="{{ route('articles.index') }}">
        <i class="fas fa-arrow-left"></i>&nbsp;Volver a listado de articulos</a> &nbsp;&nbsp;
        <!-- Editar fotos -->
        <a class="text-white" href="{{ route('article.pictures',$article->id) }}"><i class="fas fa-camera-retro"></i> editar Fotografías</a>
 </div>
</div>

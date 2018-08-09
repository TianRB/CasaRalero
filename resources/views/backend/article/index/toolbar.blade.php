<div class="row my-5 justify-content-between align-items-center">
 <div class="col-6 col-md-2 mb-4 m-md-0 text-center">
  <h6 class="">Agregar artículo</h6>
     <a class="btn btn-secondary" href="{{ route('articles.create') }}"><i class="fa fa-plus"></i>  Nuevo</a>
 </div>
 <div class="col-6 col-md-3 mb-4 m-md-0 text-right">
  <h6 class="">Filtrar Por Categoría</h6>
<div class="dropdown w-100">
<a class="btn btn-simple btn-lg dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
@if (isset($category))
 {{$category->name}}
@else
 Todas
@endif
</a>

<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
 <a class="dropdown-item" href="{{route('articles.index')}}">Ver Todas</a>
 @foreach ($categories as $c)
  <a class="dropdown-item" href="{{route('categories.show',$c->id)}}">{{$c->name}}</a>
 @endforeach
</div>
</div>
 </div>
 <div class="col-12 col-md-4 mb-5 m-md-0 text-center">
  <h6 class="text-center text-lg-right">Buscar artículo</h6>
  <form class="form-horizontal mt-3" method="POST" enctype="multipart/form-data" action="{{ route('articles.search') }}">
   {{ csrf_field() }}
   <div class="input-group no-border">
    <input type="text" value="" class="form-control text-body" name="title" placeholder="Introduce el nombre del artículo" autocomplete="off">
    <div class="input-group-append">
     <div class="input-group-text">
      <i class="fas fa-search"></i>
     </div>
    </div>
   </div>
  </form>
 </div>
</div>

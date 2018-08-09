@include('backend.article.index.toolbar')
<div class="row justify-content-start">
 @if (count($articles) > 0)
  @foreach($articles as $a)
     <div class="col-md-4">
        <div class="card article container {{ strtolower($a->subcategories->pluck('name')->implode(' ')) }}">
            <div class="card-header">
              <div class="row justify-content-between align-items-center d-flex  py-3">
                <h6 class="">{{ $a->title }}</h6>
              </div>
            </div>
            <div class="card-body">
             <div class="row justify-content-center">
              <div class="col-md-12">
                <div class="article_image" style="background-image:url('@if ($a->pics->count() > 0){{ url($a->one_pic->pluck('path')->pop()) }} @else {{ asset('img/default.jpg') }} @endif');">

                </div>
              </div>
             </div>
              {{--<p>{!! $a->content !!}</p>--}}
              <hr>
             <div class="row justify-content-center">
              <div class="col-md-5">
                <p>Categorías:</p>
                <small>{{ $a->categories->pluck('name')->implode(', ') }}</small>
              </div>-
              <div class="col-md-5">
                <p>Subcategorías:</p>
                <small>{{ $a->subcategories->pluck('name')->implode(', ') }}</small>
              {{-- <p><a href="{{ url('/related/'.$a->categories) }}">Ver en sitio</a></p> --}}
              </div>
             </div>
             <hr>
            </div>
            <div class="card-footer">
             <div class="row justify-content-around align-items-center d-flex">
             <div class="col-md-6">
              <!-- ver en backend -->
              <a class="btn btn-link" href="{{ route('articles.show',$a->id) }}"><i class="fa fa-search"></i>&nbsp;&nbsp;Detalle</a>
              <!-- borrar -->
               <form action="/articles/{{ $a->id }}" method="POST" class="no-margin">
               {{ csrf_field() }}
               <input type="hidden" name="_method" value="DELETE" />
               <button class="btn btn-link" type="submit"><i class="fa fa-trash" /></i> &nbsp;&nbsp;Eliminar</button>
               </form>
             </div>
             <div class="col-md-6">
              <!-- editar -->
               <a class="btn btn-link" href="{{ route('articles.edit',$a->id) }}"><i class="fa fa-edit"></i>&nbsp;&nbsp;Editar Información</a>
              <!-- Editar fotos -->
              <a class="btn btn-link" href="{{ route('article.pictures',$a->id) }}"><i class="fas fa-camera-retro"></i>&nbsp;&nbsp;Editar Fotos</a>
             </div>

             </div>

             <hr>
             <div class="row">
              <div class="col-12 text-center">
               <!-- ver en sitio -->
               <a class="btn btn-link" href="{{ url('/product/view/'.$a->slug) }}"><i class="fas fa-globe"></i>&nbsp;&nbsp;Visualizar en sitio</a>
              </div>
             </div>
            </div>
        </div>
     </div>
     @endforeach
 @else
  <div class="col-md-5">
   <div class="card p-5">
    <div class="card-title">
     <h2 class="title text-center">Lo sentimos!</h2>
    </div>
    <div class="card-body">
     <p class="text-center">No hay resultados para "{{ $title }}"</p>
    </div>
   </div>
  </div>
 @endif
</div>

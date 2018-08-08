<div class="row justify-content-start mt-5">
 @foreach($articles as $a)
    <div class="col-md-4">

       <div class="card article container {{ strtolower($a->subcategories->pluck('name')->implode(' ')) }}">
           <div class="card-header">
             <div class="row justify-content-between align-items-center d-flex">
               <h4 class="">{{ $a->title }}</h4>
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
             <!-- ver en backend -->
             <a class="btn btn-info" href="{{ route('articles.show',$a->id) }}"><i class="fa fa-search"></i></a>
             <!-- editar -->
              <a class="btn btn-warning" href="{{ route('articles.edit',$a->id) }}"><i class="fa fa-edit"></i></a>
              <!-- Editar fotos -->
              <a class="btn btn-warning" href="{{ route('article.pictures',$a->id) }}"><i class="fas fa-camera-retro"></i></a>
              <!-- borrar -->
              <form action="/articles/{{ $a->id }}" method="POST" class="no-margin">
              {{ csrf_field() }}
              <input type="hidden" name="_method" value="DELETE" />
              <button class="btn btn-danger" type="submit"><i class="fa fa-trash" /></i></button>
              </form>
            </div>
            <hr>
            <div class="row">
             <div class="col-12 text-center">
              <!-- ver en sitio -->
              <a class="btn btn-primary" href="{{ url('/product/view/'.$a->slug) }}"><i class="fas fa-globe"></i> Visualizar en sitio</a>
             </div>
            </div>
           </div>
       </div>
    </div>
    @endforeach
</div>

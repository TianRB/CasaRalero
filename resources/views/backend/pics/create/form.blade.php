<div class="row justify-content-center">
 @if ($article->pics()->count() > 0)
 <div class="col-md-5 mt-5">
  <div class="row">
   @foreach ($article->pics as $ap)
   <div class="col-md-6">
    <div style="background-image:url('{{url($ap->path)}}');background-size:cover;background-position:center;min-height:200px;">
    </div>
    <!-- borrar -->
    <form action="{{route('pictures.destroy', $ap->id)}}" method="POST" class="m-0">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="DELETE" />
    <button class="btn btn-danger" type="submit"><i class="fa fa-trash" /></i></button>
    </form>
   </div>

   @endforeach
  </div>
 </div>
 @endif
 @if ($article->pics()->count() < 4)
  <div class="col-md-6">
   <div class="row">
    <div class="col-sm-10 mt-5">
     <h2 class="page-heading">Imágenes <span id="counter"></span></h2>
     <form method="post" action="{{ route('pictures.store') }}" enctype="multipart/form-data" class="dropzone" id="myDropzone">
      {{ csrf_field() }}
      <input type="text" class="d-none" name="article_id" value="{{$article->id}}">
      <div class="dz-message">
       <div class="col-xs-8">
        <div class="message">
         <p>Arrastra aquí los archivos <br> o click para seleccionar <br>
          (máximo {{ 4-count($article->pics()) }} imágenes)
         </p>
        </div>
       </div>
      </div>
      <div class="fallback">
       <input type="file" name="imagen" multiple>
      </div>
     </form>
    </div>
   </div>
  </div>
 @endif

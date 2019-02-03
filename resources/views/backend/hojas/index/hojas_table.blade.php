@include('backend.hojas.index.toolbar')

<div class="row justify-content-start">
	<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('hojas.store') }}">
		{{ csrf_field() }}

		<div class="form-group-file py-4 row justify-content-center">
			<label for="imagen" class="col-md-10 text-left control-label">Subir nueva ficha:</label>
			<div class="col-10 mb-3">
				<div class="row p-3" id="filearray"></div>
			</div>
			<div class="custom-file col-md-10">
				<input id="image" name="file" type="file" class="custom-file-input" multiple=""/>
				<label class="custom-file-label" for="file">Seleccionar Archivo</label>
				@if ($errors->has('file'))
					<span class="help-block">
						<small class="text-danger">{{ $errors->first('file') }}</small>
					</span>
				@endif
			</div>
			<div class=" col-md-10">
				<label class="" for="name">Nombre</label>
				<input id="" name="name" type="text" class="">
				@if ($errors->has('name'))
					<span class="help-block">
						<small class="text-danger">{{ $errors->first('name') }}</small>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group row justify-content-center">
			<div class="col-md-8 text-center">
				<button type="submit" class="btn btn-info">
					Agregar Ficha
				</button>
			</div>
		</div>

	</form>
 @foreach($hojas as $a)
    <div class="col-md-4">

       <div class="card article container">
           <div class="card-header">

           </div>
           <div class="card-body">
            <div class="row justify-content-center">
             <div class="col-md-12">
               <div>
								 <a class="btn btn-link" href="{{ asset($a->file) }}"><i class="fa fa-search"></i>{{$a->name}}</a>
               </div>
             </div>
            </div>
             {{--<p>{!! $a->content !!}</p>--}}
             <hr>

           </div>
           <div class="card-footer">
            <div class="row justify-content-around align-items-center d-flex">
            <div class="col-md-6">

             <!-- borrar -->
              <form action="/hojas/{{ $a->id }}" method="POST" class="no-margin">
              {{ csrf_field() }}
              <input type="hidden" name="_method" value="DELETE" />
              <button class="btn btn-link" type="submit"><i class="fa fa-trash" /></i> &nbsp;&nbsp;Eliminar</button>
              </form>
            </div>
            <div class="col-md-6">
             <!-- editar -->
              <a class="btn btn-link" href="{{ route('hojas.edit',$a->id) }}"><i class="fa fa-edit"></i>Editar</a>
             </div>

            </div>

            <hr>
            <div class="row">

            </div>
           </div>
       </div>
    </div>
    @endforeach
</div>

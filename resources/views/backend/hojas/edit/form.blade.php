<div class="row justify-content-center">
	<div class="col-md-10">
		<div class="panel panel-default card">
			<div class="panel-body card-body pt-5">
				<form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ route('hojas.update', $a->id) }}">
					<input type="hidden" name="_method" value="PUT" />

					{{ csrf_field() }}

					<div class="form-group-file py-4 row justify-content-center">
						<label for="imagen" class="col-md-10 text-left control-label">Si deseas cambiar la ficha, selecciona una nueva:</label>

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
							<input id="" name="name" type="text" value="{{$a->name}}">
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
			</div>
		</div>
	</div>

</div>

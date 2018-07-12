@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Artículo</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('articles.update') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="titulo" class="col-md-4 control-label">Título</label>
                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="descripcion" class="col-md-4 control-label">Descripción</label>
                            <div class="col-md-6">
                                <textarea id="descripcion" type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="categoria" class="col-md-4 control-label">Categoría (selecciona una):</label>
                            <div class="col-md-6">
                                <select class="form-control" id="sel1" name="categoria" value="{{ old('categoria') }}">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subcategoria" class="col-md-4 control-label">Subcategoría (selecciona una):</label>
                            <div class="col-md-6">
                                <select class="form-control" id="sel1" name="subcategoria" value="{{ old('subcategoria') }}">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Enviar
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

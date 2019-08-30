<div class="row my-5 justify-content-between align-items-center">
  <div class="col-6 col-md-2 mb-4 m-md-0 text-center">
    <h6 class="">Agregar promoción</h6>
    <a class="btn btn-secondary" href="{{ route('promos.create') }}"><i class="fa fa-plus"></i>  Nuevo</a>
  </div>
  <div class="col-12 col-md-4 mb-5 m-md-0 text-center">
    <h6 class="text-center text-lg-right">Buscar promoción</h6>
    <form class="form-horizontal mt-3" method="POST" enctype="multipart/form-data" action="{{ route('promos.search') }}">
      {{ csrf_field() }}
      <div class="input-group no-border">
      <input type="text" value="@isset($search) {{$search}} @endisset" class="form-control text-body" name="name" 
      placeholder=" @isset($search) {{$search}} @else Introduce el nombre @endisset" autocomplete="off">
        <div class="input-group-append">
          <div class="input-group-text">
            <i class="fas fa-search"></i>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

@include('backend.promociones.index.toolbar')

<div class="row justify-content-start">
  
  
  @forelse ($promociones as $p)
    <div class="col-md-4">
      <div class="card promociones container">
        <div class="card-header">
          <div class="row justify-content-between align-items-center d-flex py-3">
            <h6 class="">{{ $p->nombre }}</h6>
          </div>
        </div>
        <div class="card-body">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="article_image" style="background-image:url('{{ asset($p->imagen) }}');"></div>
            </div>
          </div>
          <hr>
          <div class="row justify-content-center">
            <div class="col-md-5">
              <p>{{ $p->name }}</p>
              <p>{{ $p->precio }}</p>
            </div>
          </div>
          <hr>
        </div>
        <div class="card-footer">
          <div class="row justify-content-around align-items-center d-flex">
            <div class="col-md-6">
              <!-- borrar -->
              <form action="/promos/{{ $p->id }}" method="POST" class="no-margin">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE" />
                <button class="btn btn-link" type="submit"><i class="fa fa-trash"></i> &nbsp;&nbsp;Eliminar</button>
              </form>
            </div>
            <div class="col-md-6">
              <!-- editar -->
              <a class="btn btn-link" href="{{ route('promos.edit',$p->id) }}"><i class="fa fa-edit"></i>&nbsp;&nbsp;Editar Información</a>
            </div>
          </div>
          <hr>
        </div>
      </div>
    </div>
  @empty
    <p>No hay Promociones</p>
  @endforelse
  
  
  
</div>

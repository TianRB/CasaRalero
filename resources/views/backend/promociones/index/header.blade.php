<div class="panel-header panel-header-md">
  <div class="header text-center">
    <h2 class="title">Promociones</h2>
    @isset($search)
      <div class="row justify-content-center align-items-center">
        <div class="col-md-4 mb-4 m-md-0">
          <p class="category">
            <a class="text-white" href="{{ route('promos.index') }}">
              <i class="fas fa-arrow-left"></i>&nbsp; Ver todas 
            </a>
          </p>
        </div>
      </div>
    @endisset
  </div>
</div>

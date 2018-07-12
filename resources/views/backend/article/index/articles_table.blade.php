<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default ">
                <div class="panel-heading"></div>

                <div class="panel-body">
                    @foreach($articles as $a)
                      <div class="card article container {{ strtolower($a->subcategories->pluck('name')->implode(' ')) }}">
                          <div class="card-header">
                            <div class="row justify-content-between align-items-center d-flex">
                              <h4 class="col-md-8">{{ $a->title }}</h4>
                              <div class="row align-items-center d-flex">
                                <a href="{{ url('articles/'.$a->id.'/edit') }}"><button class="btn btn-warning article-btn" type="submit"><i class="fa fa-edit" /></i></button></a>
                                <form action="/articles/{{ $a->id }}" method="POST" class="no-margin">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE" />
                                <button class="btn btn-danger article-btn" type="submit"><i class="fa fa-trash" /></i></button>
                                </form>
                              </div>
                            </div>
                          </div>
                          <div class="card-body row">
                            <div class="col-md-2">
                              <img src="{{ $a->one_pic->pluck('path')->pop() }}" alt="{{ $a->title }}" class="article-img img-responsive">
                            </div>
                            {{--<p>{!! $a->content !!}</p>--}}
                            <div class="col-md-3">
                              <p>Categorías:</p>
                              <small>{{ $a->categories->pluck('name')->implode(', ') }}</small>
                            </div>
                            <div class="col-md-3">
                              <p>Subcategorías:</p>
                              <small>{{ $a->subcategories->pluck('name')->implode(', ') }}</small>
                            {{-- <p><a href="{{ url('/related/'.$a->categories) }}">Ver en sitio</a></p> --}}
                            </div>
                            <div class="col-md-3">
                              <p><a href="{{ url('/showArticle/'.$a->id) }}">Ver en sitio</a></p>
                            </div>
                          </div>
                      </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
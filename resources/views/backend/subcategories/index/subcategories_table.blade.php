<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default ">
                <div class="panel-heading"></div>

                <div class="panel-body">
                    @foreach($subcategories as $s)
                      <div class="card article container">
                          <div class="card-header">
                            <div class="row justify-content-between">
                              <h4 class="col-md-8">{{ $s->name }}</h4>
                               <div class="row">
                                {{--<a href="{{ url('categories/'.$s->id.'/edit') }}"><button class="btn btn-warning article-btn" type="submit"><i class="fa fa-edit" /></i></button></a>--}}
                                <form action="/subcategories/{{ $s->id }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE" />
                                <button class="btn btn-danger article-btn" type="submit"><i class="fa fa-trash" /></i></button>
                                </form>
                              </div> 
                            </div>
                          </div>
                          <div class="card-body">
                          </div>
                      </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
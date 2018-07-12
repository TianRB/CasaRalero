@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $article->title }}</div>

                <div class="panel-body">
                  <div class="col-md-2">
                    <img src="../{{ $article->one_pic->pluck('path')->pop() }}" alt="{{ $article->title }}" class="article-img img-responsive"/>
                  </div>
                  <p>{!! $article->content !!}</p>
                  <div>
                    @foreach($article->pics as $pic)
                      <img src="../{{ $pic->path }}" alt="{{ $article->title }}" style="max-height: 100px">
                    @endforeach
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    @foreach($related as $a)
                    <div class="article container {{ strtolower($a->subcategories->pluck('name')->implode(' ')) }}">
                        <h4>{{ $a->title }}</h4>
                        {{--<p>{{ $a->content }}</p>--}}
                        <p>Categorías:</p>
                        @foreach($a->categories as $cat)
                            {{ $cat->name }}
                        @endforeach
                        <p>Subcategorías:</p>
                        {{ $a->subcategories->pluck('name')->implode(' ') }}</p>
                        <p><a href="{{ url('/related/'.$a->categories) }}">Relacionados</a></p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

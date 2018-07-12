@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Artículos</div>

                <div class="panel-body">
                    @foreach($articles as $a)
                    <div class="article container {{ strtolower($a->subcategories->pluck('name')->implode(' ')) }}">
                        <h4>{{ $a->title }}</h4>
                        <img src="{{ $a->one_pic->pluck('path')->pop() }}" alt=""/>
                        <p>{!! $a->content !!}</p>
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
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>sidebar</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

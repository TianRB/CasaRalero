@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Artículos</div>

                <div class="panel-body">
                    @foreach($articles as $a)
                    <div class="container">
                        <h4>{{ $a->title }}</h4>
                        <p>{{ $a->content }}</p>
                        <p>{{ $a->categories }}</p>
                        <p>{{ $a->subcategories }}</p>
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

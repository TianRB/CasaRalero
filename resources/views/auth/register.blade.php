@extends('layouts.app')

@section('content')
<body class="login-page">
 <div class="page-header" filter-color="orange">
        <div class="page-header-image" style="background-image:url(../assets/img/login.jpg)"></div>
        <div class="content-center">
            <div class="container">
                <div class="col-md-4 content-center">
                    <div class="card card-login card-plain">
                      {!! Form::open(['route' => ['register'], 'method' => 'POST']) !!}
                       @include('auth.registerForm')
                      {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection

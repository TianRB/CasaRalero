@extends('layouts.app')
@section('content')
 <div class="row justify-content-center align-items-center" style="height:100vh;">
  <div class="col-md-4">
   <div class="card card-login card-plain">
    <div class="card-body">
     <div class="image text-center">
      <img src="{{url('img/logo-casa-ralero.png')}}" alt="">
     </div>
     @include('auth.loginForm')
    </div>
   </div>
  </div>
 </div>
@endsection

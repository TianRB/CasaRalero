@extends('backend.layouts.app')
@section('content')
 <!-- Navbar -->
 @include('backend.layouts.navbars.nav_expand')
 @include('backend.promociones.create.header')
 <div class="content">

   @include('backend.promociones.create.form')

 </div>
 @include('backend.layouts.footers.footer')
@endsection
@section('page_scripts')

@endsection

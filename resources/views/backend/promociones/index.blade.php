@extends('backend.layouts.app')
@section('content')
 <!-- Navbar -->
 @include('backend.layouts.navbars.nav_expand')
 @include('backend.promociones.index.header')
 <div class="content">
   @include('backend.promociones.index.promociones_table')
 </div>
 @include('backend.layouts.footers.footer')
@endsection

@extends('backend.layouts.app')
@section('content')
 <!-- Navbar -->
 @include('backend.layouts.navbars.nav_expand')
 @include('backend.promociones.search.header')
 <div class="content">
   @include('backend.promociones.search.articles_table')
 </div>
 @include('backend.layouts.footers.footer')
@endsection

@extends('backend.layouts.app')
@section('content')
 <!-- Navbar -->
 @include('backend.layouts.navbars.nav_expand')
 @include('backend.category.index.header')
 <div class="content">
  <div class="row">
   @include('backend.category.index.categories_table')
  </div>
 </div>
 @include('backend.layouts.footers.footer')
@endsection

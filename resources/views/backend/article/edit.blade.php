@extends('backend.layouts.app')

@section('content')
 <!-- Navbar -->
 @include('backend.layouts.navbars.nav_expand')
 @include('backend.article.index.header')
 <div class="content">
  <div class="row">
   @include('backend.article.edit.form')
  </div>
 </div>
 @include('backend.layouts.footers.footer')
@endsection

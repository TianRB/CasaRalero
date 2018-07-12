@extends('backend.layouts.app')
@section('content')
 <!-- Navbar -->
 @include('backend.layouts.navbars.nav_expand')
 @include('backend.article.index.header')
 <div class="content">
  <div class="row">
   @include('backend.article.index.articles_table')
  </div>
 </div>
 @include('backend.layouts.footers.footer')
@endsection

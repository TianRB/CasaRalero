@extends('backend.layouts.app')

@section('content')
 <!-- Navbar -->
 @include('backend.layouts.navbars.nav_expand')
 @include('backend.hojas.edit.header')
 <div class="content">
   @include('backend.hojas.edit.form')
 </div>
 @include('backend.layouts.footers.footer')
@endsection
@section('page_scripts')
	
@endsection

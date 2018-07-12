@extends('backend.layouts.app')

@section('content')
 <!-- Navbar -->
 @include('backend.layouts.navbars.nav_expand')
 @include('backend.article.create.header')
 <div class="content">

   @include('backend.article.create.form')

 </div>
 @include('backend.layouts.footers.footer')
@endsection
@section('page_scripts')
 <!-- CKeditor -->
 {!! Html::script('ckeditor/ckeditor.js') !!}
@endsection

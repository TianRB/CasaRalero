@extends('backend.layouts.app')
@section('page_styles')

 {!! Html::style('css/dropzone.css') !!}
@endsection
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
 <!-- Dropzone -->
 {!! Html::script('js/dropzone.js') !!}
 <script type="text/javascript">
 $( document ).ready(function() {

  });
 </script>
@endsection

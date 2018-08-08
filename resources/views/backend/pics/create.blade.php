@extends('backend.layouts.app')
@section('page_title')
 Imagenes
@endsection
@section('page_styles')

 {!! Html::style('css/dropzone.css') !!}
@endsection
@section('content')
 <!-- Navbar -->
 @include('backend.layouts.navbars.nav_expand')
 @include('backend.pics.create.header')
 <div class="content">

   @include('backend.pics.create.form')

 </div>
 @include('backend.layouts.footers.footer')
@endsection
@section('page_scripts')
 <!-- CKeditor -->
 {!! Html::script('ckeditor/ckeditor.js') !!}
 <!-- Dropzone -->
 {!! Html::script('js/dropzone.js') !!}
 {!! Html::script('js/dropzone-config.js') !!}

@endsection

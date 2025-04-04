<!DOCTYPE html>
<!--
**********************************************************************************************************
    Copyright (c) 2023.
**********************************************************************************************************  -->
<!-- 
Template Name: eClass - Learning Management System 
Version: 5.4.1
Author: Media City
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]> -->

<?php
$language = Session::get('changed_language'); //or 'english' //set the system language
$rtl = array('ar','he','ur', 'arc', 'az', 'dv', 'ku', 'fa'); //make a list of rtl languages
?>

<html lang="en" @if (in_array($language,$rtl)) dir="rtl" @endif>
<!-- <![endif]-->
<!-- head -->
<head>
@include('theme.head')

</head>
@if($gsetting->cookie_enable == '1')
@include('cookieConsent::index')
@endif
<!-- end head -->
<!-- body start-->
<body>
@if(env('GOOGLE_TAG_MANAGER_ENABLED') == 'true' && env('GOOGLE_TAG_MANAGER_ID') == !NULL)
@include('googletagmanager::body')
@endif
<!-- preloader --> 
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
@if($gsetting->preloader_enable == 1)
<div class="preloader">
    <div class="status">
      @if(isset($gsetting->preloader_logo))
        <div class="status-message">
        	<img src="{{ asset('images/logo/'.$gsetting['preloader_logo']) }}" alt="logo" class="img-fluid">
        </div>
      @endif
    </div>
</div>
@endif
<!-- whatsapp chat button -->
<div id="myButton"></div>


@php
  if(isset(Auth::user()->orders)){
      //Run User Enroll expire background process
      App\Jobs\EnrollExpire::dispatchNow();
  }

  if(env('ENABLE_INSTRUCTOR_SUBS_SYSTEM') == 1){

    if(isset(Auth::user()->plans)){
        //Run User Plan Subscription expire background process
        App\Jobs\InstructorPlan::dispatchNow();
    }
  }
@endphp
<!-- end preloader -->
<!-- top-nav bar start-->
@include('theme.nav')
<!-- top-nav bar end-->
<!-- home start -->
@yield('content')
<!-- testimonial end -->
<!-- footer start -->
@include('theme.footer')
<!-- footer end -->
<!-- jquery -->
@include('theme.scripts')
<!-- end jquery -->
</body>
<!-- body end -->
</html> 

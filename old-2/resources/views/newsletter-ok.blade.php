@extends('layouts.base')

@section('title', trans('header.title').' -'.trans('header.contact'))

@section('content')
@php
   $locale=App::getLocale();
@endphp
<!--banner section-->
<section class="page-title" style="background: url('/public/img/about-banner.jpg');">
  <div class="container">
    <div class="row">
      <div class="col-md-12"> 
        <!-- breadcrumb content -->
        <div class="ad-title">
          <h2><span style="font-weight: 100;">Contact</span> 联系我们</h2>
        </div>
        <!-- end breadcrumb content --> 
      </div>
    </div>
  </div>
</section>

<!--end banner banner-->
<div class="container">
  <div class="row">
    <div class="col-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home"></i> <a href="/">{{ trans('header.home') }}</a></li>
          <li class="breadcrumb-item"><a href="about">{{ trans('about.about') }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ trans('header.contact') }}</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<!-- end breadcrumb -->
  
  <!-- #call-to-action --> 
  <div class="text-center"><h2>{{ ($locale=='en') ? 'Thank you for subscribing to our newsletter. We will send newsletter to your mailbox regularly.' : '感谢订阅我们的newsletter，我们将定期发送newsletter到您的邮箱' }}</h2></div>
  

@endsection
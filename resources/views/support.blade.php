@extends('layouts.base')
@php
$locale=App::getLocale();
@endphp
@section('title', ($locale=='en')?'Show a support':'查看技术支持')

@section('content')

<!--banner section-->
<section class="products-banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12"> 
        <!-- breadcrumb content -->
        <div class="ad-title">
          <h2><span style="font-weight: 100;">Support</span> 技术支持</h2>
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
          <li class="breadcrumb-item"><a href="/support">{{ trans('header.support') }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ ($locale=='en') ? $support->support_title_en : $support->support_title }}</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<!-- end breadcrumb -->
<section class="darker-bg section-padding">
  <div class="container">
    <div class="row">      
      <div class="col-12 col-md-12">
        <div class="news-content">
          <hr>
          <h3 class="news-content-title">{{ ($locale=='en') ? $support->support_title_en : $support->support_title }}</h3>
          <div class="text-center">{{ ($locale=='en') ? $support->created_at->format('M d Y') : $support->created_at->format('Y-m-d') }}</div>
          <div class="news-content-content">
            {!! ($locale=='en') ? $support->support_content_en : $support->support_content !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection


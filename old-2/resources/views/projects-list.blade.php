@extends('layouts.base')

@section('title', trans('header.title').' -'.trans('header.projects'))

@section('content')
@php
$locale=App::getLocale();
@endphp
<!--banner section-->
<section class="page-title" style="background: url('/public/img/case-banner.jpg');">
  <div class="container">
    <div class="row">
      <div class="col-md-12"> 
        <!-- breadcrumb content -->
        <div class="ad-title">
          <h2><span style="font-weight: 100;">Projects</span> 工程案例</h2>
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
          <li class="breadcrumb-item active" aria-current="page">{{ trans('header.projects') }}</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<!-- end breadcrumb -->
<section class="darker-bg section-padding">
  <div class="container">
    <div class="row">
      <div class="col-3 leftNav hidden-print hidden-xs hidden-sm" id="leftNav">
        <div class=""> <!--data-spy="affix" data-offset-top="82"-->
          
          <div class="product_left_title">{{ trans('header.projects') }}&nbsp;&nbsp;<i class="fa fa-list pull-right"></i></div>
          <div id="my_menu" class="sdmenu">
            <ul class="product_leftmenu_ul" id="masterul">
              @foreach ($projects as $project)
              <li class="bigsort"><a href="{{ url('project/'.$project->id) }}">{{ ($locale=='en') ? $project->project_title_en : $project->project_title }}</a></li>
              @endforeach
            </ul>
          </div>
          <div class="leftnavButtom"> </div>
        </div>
      </div>
      
      <!--end left category nav-->
      
      <div class="col-9">
        <div class="case-wrapper">
          <hr style="margin-top: 0px;">
          <div class="row">
           @foreach ($projects as $value)
            <div class="col-4"> <a href="{{ url('project/'.$value->id) }}"><img class="center-block img-fluid" src="{{ $value->project_listimg }}" alt="{{ ($locale=='en') ? $value->project_title_en : $value->project_title }}" ></a>
              <div class="t">
                <h4><a href="{{ url('project/'.$value->id) }}">{{ ($locale=='en') ? $value->project_title_en : $value->project_title }}</a></h4>
                <div class="add">{!! ($locale=='en') ? str_limit($value->project_content_en,100,'......') : str_limit($value->project_content,100,'......') !!}</div>
                <div class="time">{{ ($locale=='en') ? $value->created_at->format('M d Y') : $value->created_at->format('Y-m-d') }}</div>
              </div>
            </div>
            @endforeach        
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
 @endsection
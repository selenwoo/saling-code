@extends('layouts.base')
@php
$locale=App::getLocale();
@endphp
@section('title', ($locale=='en')?'Show a project':'查看案例')

@section('content')

<!--banner section-->
<section class="products-banner">
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
          <li class="breadcrumb-item"><a href="/projects">{{ trans('header.projects') }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ ($locale=='en') ? $project->project_title_en : $project->project_title }}</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<!-- end breadcrumb -->
<section class="darker-bg section-padding">
  <div class="container">
    <div class="row">
      <div class="col-3 col-md-3 leftNav hidden-print hidden-xs hidden-sm" id="leftNav">
        <div class=""> <!--data-spy="affix" data-offset-top="82"-->
          
          <div class="product_left_title">{{ trans('header.projects') }}&nbsp;&nbsp;<i class="fa fa-list pull-right"></i></div>
          <div id="my_menu" class="sdmenu">
            <ul class="product_leftmenu_ul" id="masterul">
              @foreach ($projects as $project1)
              <li class="bigsort"><a href="{{ url('project/'.$project1->id) }}">{{ ($locale=='en') ? $project1->project_title_en : $project1->project_title }}</a></li>
              @endforeach
            </ul>
          </div>
          <div class="leftnavButtom"> </div>
        </div>
      </div>
      
      <!--end left category nav-->
      
      <div class="col-9 col-md-9">
        <div class="news-content">

      <hr>

<h3 class="news-content-title">{{ ($locale=='en') ? $project->project_title_en : $project->project_title }}</h3>

 <div class="text-center">{{ ($locale=='en') ? $project->created_at->format('M d Y') : $project->created_at->format('Y-m-d') }}</div>

  <div class="news-content-content">

{!! ($locale=='en') ? $project->project_content_en : $project->project_content !!}
  <div class="text-center"><img src="{{ $project->project_listimg }}" class="img-fluid"></div>
</div>

   <div style="float:left; padding-top:6px; font-size:12px;">分享到：</div><div class="bdsharebuttonbox"><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_more" data-cmd="more"></a></div>

<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["weixin","sqq","tsina","tqq","qzone"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["weixin","sqq","tsina","tqq","qzone"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>

    </div>
      </div>
    </div>
  </div>
</section>

@endsection


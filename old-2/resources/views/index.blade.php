@extends('layouts.base')<!-- 载入结构，头尾 -->

@section('title', trans('header.title').' -'.trans('header.home'))<!-- 向title传值 -->

@section('content')<!-- 页面内容 -->
@php
   $locale=App::getLocale();
@endphp
<!--AD section-->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active"> 
      {!! ($locale=='en') ? '<img class="first-slide img-fluid" src="/public/img/intro-carousel/1-en.jpg" alt="First slide">' : '<img class="first-slide img-fluid" src="/public/img/intro-carousel/1.jpg" alt="First slide">' !!}
    </div>
    <div class="carousel-item"> 
      {!! ($locale=='en') ? '<img class="second-slide img-fluid" src="/public/img/intro-carousel/2-en.jpg" alt="Second slide">' : '<img class="second-slide img-fluid" src="/public/img/intro-carousel/2.jpg" alt="Second slide">' !!}

      

    </div>
    <div class="carousel-item"> 
      
{!! ($locale=='en') ? '<img class="third-slide img-fluid" src="/public/img/intro-carousel/3-en.jpg" alt="Third slide">' : '<img class="third-slide img-fluid" src="/public/img/intro-carousel/3.jpg" alt="Third slide">' !!}
    </div>
  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
<!--end AD banner-->

<main id="main">
  <section>
    <div class="container index-about"> 
      
      <!-- Three columns of text below the carousel -->
      
      <div class="row">
        <div class="col-lg-4">
          <h4>{{ trans('index.company_profile') }}</h4>
          <lable class="title-line"> </lable>
          <div class="myimages"><a href="/about"><img class="center-block img-fluid" src="/public/img/index-about.jpg" alt="{{ trans('index.company_name') }}" ></a></div>
          <div class="t">
            <h5><a href="/about">{{ trans('index.company_name') }}</a></h5>
            <p>{{ trans('index.company_intro') }}</p>
            <div class="more-index"><a href="/about">{{ trans('index.more') }} &raquo;</a></div>
          </div>
        </div>
        
        <!-- /.col-lg-4 -->
        
        <div class="col-lg-4">
          <h4>{{ trans('index.project_title') }}</h4>
          <lable class="title-line"> </lable>
          <div class="myimages"><a href="/project/1"><img class="center-block img-fluid" src="/public/img/index-case.jpg" alt="{{ trans('index.project_title') }}" ></a></div>
          <div class="t">
            <h5><a href="/project/1">{{ trans('index.project_name') }}</a></h5>
            <p>{{ trans('index.project_intro') }}<br>
              <br>
            </p>
            <div class="more-index"><a href="/projects">{{ trans('index.more') }}   &raquo;</a></div>
          </div>
        </div>
        
        <!-- /.col-lg-4 -->
        
        <div class="col-lg-4">
          <h4>{{ trans('index.contact') }}</h4>
          <lable class="title-line"> </lable>
          <div class="myimages"><a href="/contact"><img class="center-block img-fluid" src="/public/img/contact-us.jpg" alt="{{ trans('index.contact') }}"></a></div>
          <div class="t">
            <h5>{{ trans('index.company_fullname') }}</h5>
            <ul>
              <li>{{ trans('index.add') }}</li>
              <li>{{ trans('index.tel') }}</li>
              <li>E-mail: info@ledsailing.com</li>
            </ul>
            <br>
            <br>
            <div class="more-index"><a href="/contact">{{ trans('index.more') }}   &raquo;</a></div>
          </div>
        </div>
        
        <!-- /.col-lg-4 --> 
        
      </div>
      
      <!-- /.row --> 
      
    </div>
  </section>
  
 
  <!-- #testimonials --> 
  <!--  products-->
  <section class="section-padding darker-bg">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="index-pro-title float-left">
            <h4 class="m-b-0"><a href="products">{{ trans('index.ourpro') }}</a></h4>
          </div>
          <div class="index-pro-more float-right">
            <h6 class="p-top-10 m-b-10"><a href="products">MORE &raquo; </a></h6>
          </div>
			<div class="clearfix"></div>
          <hr>
        </div>
      </div>
    </div>
    
    <!--轮播产品图-->
    
    <div class="container p-top-20">
      <div>
        <div class="jcarousel-wrapper">
          <div class="jcarousel">
            <ul>
              @foreach ($topproducts as $hotpro)
              <li> <a href="{{ url('products/'.$hotpro->id) }}">
                <div class="pic"><img class="img-fluid" src="{{ $hotpro->pro_listimg }}" alt="{{ ($locale=='en') ? $hotpro->pro_name_en : $hotpro->pro_name }}" /></div>
                <div class="jcarousel-title">{{ ($locale=='en') ? $hotpro->pro_name_en : $hotpro->pro_name }}</div>
                </a> </li>
              @endforeach
              
            </ul>
          </div>
          <a href="#" class="jcarousel-control-prev"></a> <a href="#" class="jcarousel-control-next"></a> 
          
          <!--<p class="jcarousel-pagination"></p> --> 
          
        </div>
      </div>
      
    </div>
  </section>
</main>

@endsection


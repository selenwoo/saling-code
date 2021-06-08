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
<main id="main"> 
  

  <!-- #about --> 
  <!--==========================
      Call To Action Section
    ============================-->
  <section id="call-to-action" class="wow fadeInUp">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 text-center text-lg-left">
          <h3 class="cta-title">{{ trans('about.getour_service') }}</h3>
          <p class="cta-text">{{ trans('about.getour_service_content') }}</p>
        </div>
        <div class="col-lg-3 cta-btn-container text-center"> <a class="cta-btn align-middle" href="#contact">{{ trans('about.contact') }}</a> </div>
      </div>
    </div>
  </section>
  <!-- #call-to-action --> 
  
  <!--==========================
      Contact Section
    ============================-->
  <section id="contact" class="wow fadeInUp">
    <div class="container">
      <div class="section-header">
        <h2>{{ trans('about.contact') }}</h2>

      </div>
      <div class="row contact-info">
        <div class="col-lg-5">
		  <div class="contact-email"> 
            
            <p><h3>{{ trans('about.company_name') }}</h3></p>
          </div>
          <div class="contact-address"> <i class="fa fa-map-marker"></i>
            <h3>{{ trans('about.add') }}</h3>
            <address>
            {{ ($locale=='en') ? $company->company_add_en : $company->company_add }}
            </address>
          </div>
          <div class="contact-phone"> <i class="fa fa-phone"></i>
            <h3>{{ trans('about.tel') }}</h3>
            <p>{{ $company->company_tel }}</p>
			
          </div>
		  <div class="contact-phone"> <i class="ion-android-phone-portrait"></i>
            <h3>{{ trans('about.mobile') }}</h3>
            <p>{{ $company->company_phone }}</p>
			
          </div>
		  <div class="contact-phone"> <i class="fa fa-fax"></i>
            <h3>{{trans('about.fax')}}</h3>
            <p>{{$company->compay_fax}}</p>
			
          </div>
          <div class="contact-email"> <i class="fa fa-envelope-o"></i>
            <h3>Email</h3>
            <p><a href="mailto:info@ledsailing.com">info@ledsailing.com</a></p>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="container">
            <div class="form"> 
              
              Thank you for your message. We will contact you later
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="allmap0" class="container mb-4 map">
      
	</div>
  </section>

@endsection
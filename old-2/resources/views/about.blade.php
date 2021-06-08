@extends('layouts.base')

@section('title', trans('header.title').' -'.trans('header.about'))

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
          <h2><span style="font-weight: 100;">About Us</span> 关于我们</h2>
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
          <li class="breadcrumb-item"><i class="fa fa-home"></i> <a href="/">{{ trans('about.home') }}</a></li>
          <li class="breadcrumb-item"><a href="#">{{ trans('about.about') }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ trans('about.company_profile') }}</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<!-- end breadcrumb -->
<main id="main"> 
  
  <!--==========================
      About Section
    ============================-->
    <section id="about" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-header">
              <h2>{{ trans('about.about') }}</h2>
              <div class="about-content">{{ ($locale=='en') ? $company->company_intro_en : $company->company_intro }}</div>
            </div>
          </div>

          <div class="col-6 about-img"> <img src="/public/img/about-img.jpg" class="img-fluid" alt=""> </div>
          <div class="col-6 content">
            <h2>{{ trans('about.our_products') }}</h2>
            <ul>
              <li><i class="icon ion-ios-checkmark-outline"></i> {{ trans('about.product01') }}</li>
              <li><i class="icon ion-ios-checkmark-outline"></i> {{ trans('about.product02') }}</li>
              <li><i class="icon ion-ios-checkmark-outline"></i> {{ trans('about.product03') }}</li>
              <li><i class="icon ion-ios-checkmark-outline"></i> {{ trans('about.product04') }}</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  <!-- #about --> 
  <!--==========================
      Call To Action Section
    ============================-->
  <section id="call-to-action" class="wow fadeInUp">
    <div class="container">
      <div class="row">
        <div class="col-9 text-center text-lg-left">
          <h3 class="cta-title">{{ trans('about.getour_service') }}</h3>
          <p class="cta-text">{{ trans('about.getour_service_content') }}</p>
        </div>
        <div class="col-3 cta-btn-container text-center"> <a class="cta-btn align-middle" href="#contact">{{ trans('about.contact') }}</a> </div>
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
        <div class="col-5">
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
        <div class="col-7">
          <div class="container">
            <div class="form"> 
              
              <!-- Form itself -->
              <form action="{{ url('contact') }}" method="POST" name="sentMessage" class="well" id="contactForm"  novalidate>
                {!! csrf_field() !!}
                <div class="control-group">
                  <div class="form-group">
                    <input type="text" class="form-control" 
             placeholder="Full Name" id="name" name="name" required
                 data-validation-required-message="Please enter your name" value="{{ old('name') }}" />
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group">
                  <div class="controls">
                    <input type="email" class="form-control" placeholder="Email" 
                      id="email" name="email" required
               data-validation-required-message="Please enter your email" value="{{ old('email') }}" />
                  </div>
                </div>
                <div class="form-group">
                  <div class="controls">
                    <textarea rows="10" cols="100" class="form-control" 
                       placeholder="Message" id="message" name="message" required
           data-validation-required-message="Please enter your message" minlength="5" 
                       data-validation-minlength-message="Min 5 characters" 
                        maxlength="999" style="resize:none">{{ old('message') }}</textarea>
                  </div>
                </div>
                <div id="success"> </div>
                <!-- For success/fail messages -->
                <button type="submit" class="btn btn-primary pull-right">{{trans('about.subbtn')}}</button>
                <br />
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="allmap0" class="container mb-4 map">
      
	</div>
  </section>

@endsection
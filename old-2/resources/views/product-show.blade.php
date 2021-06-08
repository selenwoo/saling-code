
@extends('layouts.base')
@php
$locale=App::getLocale();
$productname=($locale=='en') ? $product->pronameen : $product->pro_name
@endphp
@section('title', $productname.' -'.trans('header.title'))

@section('content')

<!--banner section-->
<section class="products-banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12"> 
        <!-- breadcrumb content -->
        <div class="ad-title">
          <h2><span style="font-weight: 100;">Our Products</span> 产品中心</h2>
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
          <li class="breadcrumb-item"><a href="/products">{{ trans('header.product') }}</a></li>
          <li class="breadcrumb-item"><a href="{{ url('products-list/'.$category->slug) }}">{{ ($locale=='en') ? $category->categorynameen : $category->category_name }}</a></li>
          <li class="breadcrumb-item"><a href="{{ url('products-list/'.$product->category_slug) }}">{{ ($locale=='en') ? $product->categorynameen : $product->category_name }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $productname }}</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<!-- end breadcrumb -->
<section class="section-padding">
  <div class="container">
    <div class="row">
      <div class="col-5">
        <div class="exzoom" id="exzoom"> 
          <!--大图区域-->
          
                                
          <div class="exzoom_img_box">
            <ul class="exzoom_img_ul">
              @php
                                $str = $product->pro_img;
                                $cars=explode("|",$str);
                                $arrlength=count($cars);
                                for($x=0;$x<$arrlength;$x++) {
                                  

                                  echo '<li><img alt="" src="'.$cars[$x].'"></li>';

                                  
                                }
                                @endphp
              
            </ul>
          </div>
          <!--缩略图导航-->
          <div class="exzoom_nav"></div>
          <!--控制按钮-->
          <p class="exzoom_btn"> <a href="javascript:void(0);" class="exzoom_prev_btn"> &#8249; </a> <a href="javascript:void(0);" class="exzoom_next_btn"> &#8250; </a> </p>
        </div>
      </div>
      <div class="col-7">
        <h2>{{ $productname }}</h2>
        
        <h4>{{ trans('product.product-features') }}:</h4>
        <ul>
          <li></li>
          
        </ul>
        <div>{!! ($locale=='en') ? $product->pro_feature_en : $product->pro_feature !!}</div>
        <div class="p-top-40"> <a href="/contact#contact" class="btn btn-primary btn-lg fancybox fancybox.iframe">{{ trans('product.inquiry') }}</a>&nbsp; <a href="/products/" class="btn btn-primary btn-lg ">{{ trans('product.other-products') }}</a> </div>
      </div>
    </div>
    
    <!--tab-->
    <ul class="nav nav-tabs p-top-30" id="myTab" role="tablist">
      <li class="nav-item"> <a class="nav-link active" id="des-tab" data-toggle="tab" href="#pro-des" role="tab" aria-controls="des"
            aria-selected="true"> {{ trans('product.product-des') }} </a> </li>
      <li class="nav-item"> <a class="nav-link" id="home-tab" data-toggle="tab" href="#guige" role="tab" aria-controls="home"
            aria-selected="false"> {{ trans('product.product-spec') }} </a> </li>
    <li class="nav-item"> <a class="nav-link" id="manual-tab" data-toggle="tab" href="#manual" role="tab" aria-controls="profile"
            aria-selected="false"> {{ trans('product.product-manual') }} </a> </li>

    </ul>
    <div class="tab-content" id="myTabContent" >
      <div class="tab-pane fade show active" id="pro-des" role="tabpanel" aria-labelledby="des-tab"> 
      <p>{!! ($locale=='en') ? $product->pro_intro_en : $product->pro_intro !!}</p>
    </div>
    <div class="tab-pane fade" id="guige" role="tabpanel" aria-labelledby="home-tab">
        <div class="row">
          <div class="col-6">
            <div>
              {!! ($locale=='en') ? $product->pro_parameter_en : $product->pro_parameter !!}
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="manual" role="tabpanel" aria-labelledby="manual-tab"> 
     <p class="p-top-100 p-bottom-100"> <a class="btn btn-lg btn-primary" href="{{ $product->pro_manual }}"><i class="fa fa-file-pdf-o"></i> {{ trans('product.manual') }}</a></p> 
    </div>
      
    </div>
    
    <!--end Tabs--> 
    
  </div>
</section>
<section class="darker-bg section-padding">
<div class="container">
    <!--相关产品-->

  <div class="relatedTitle">

    <h3>{{ trans('product.related-products') }}</h3>

    <lable class="myline"> </lable>

  </div>
        <div class="jcarousel-wrapper">
          <div class="jcarousel">
            <ul>
              @foreach ($related as $RelatedProducts)
              <li>
                <div class="grid">
                  <figure class="effect-julia"> <a href="{{ url('/products/'.$RelatedProducts->slug) }}"><img class="img-fluid" src="{{ $RelatedProducts->pro_listimg }}" alt="img21"></a>
                    <figcaption>
                      <div>
                        <p>{{ ($locale=='en') ? $RelatedProducts->pronameen : $RelatedProducts->pro_name }}</p>

                      </div>
                      <a href="{{ url('/products/'.$RelatedProducts->slug) }}">View more</a> </figcaption>
                  </figure>
                </div>
              </li>
             @endforeach
 
            </ul>
          </div>
          <a href="#" class="jcarousel-control-prev"></a> <a href="#" class="jcarousel-control-next"></a> 
      </div>
      </div>
  </section>


@endsection


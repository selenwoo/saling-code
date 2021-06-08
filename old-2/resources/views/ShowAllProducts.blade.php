@extends('layouts.base')

@section('title', trans('header.title').' -'.trans('header.product'))

@section('content')
@php
$locale=App::getLocale();
@endphp
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

          <li class="breadcrumb-item active" aria-current="page">{{ trans('header.product') }}</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<!-- end breadcrumb -->

<section class="darker-bg section-padding">
  <div class="container">
    <div class="row">
      <div class="col-xl-3 col-lg-3 col-md-3 leftNav hidden-print hidden-xs hidden-sm" id="leftNav">
        <div class=""> <!--data-spy="affix" data-offset-top="82"-->
          
          <div class="product_left_title">{{ trans('product.products-list') }}<i class="fa fa-list-ul pull-right"></i></div>
          <div id="my_menu" class="sdmenu">
            <ul class="product_leftmenu_ul" id="masterul">
              @foreach ($categories as $one)
              <li>
                <div class="collapsed" id="e{{ $one->id }}"> <span><a class="leftmenu-ul-bg" href="{{ url('products-list/'.$one->id) }}">{{ ($locale=='en') ? $one->category_name_en : $one->category_name }}</a></span>
                  <ul>
                    @foreach ($one->zi as $two)
                    <li><a href="{{ url('products-list/'.$two->id) }}">{{ ($locale=='en') ? $two->category_name_en : $two->category_name }}<i class="fa fa-angle-right pull-right" aria-hidden="true"></i></a></li>
                    @endforeach
                  </ul>
                </div>
              </li>            
              @endforeach
            </ul>
          </div>
          <div class="leftnavButtom"> </div>
        </div>
        <script language="javascript">
          var myMenu = new SDMenu("my_menu");
          myMenu.init();
        </script>
        <div class="download-pdf">
          <h4><i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size: 18px;"></i>&nbsp;{{ trans('product.manual_download') }}</h4>
          <a href="/catalogue.pdf"><img src="/public/img/catalog.jpg" class="img-fluid" alt=""></a> </div>
        <div class="product_left_title text-center">{{ trans('product.hotsale') }}</div>
        <div class="hotsaletop">
          <ul>
            @foreach ($topproducts as $key=> $hotpro)
            <li>
              
              <div class="row">
                <div class="col-5"><a href="{{ url('products/'.$hotpro->id) }}"><img class="img-fluid" src="{{ $hotpro->pro_listimg }}" alt="{{ ($locale=='en') ? $hotpro->pro_name_en : $hotpro->pro_name }}"></a></div>
                <div class="col-7">
                  <h5>TOP {{ $key+1 }}</h5>
                  <p><a href="{{ url('products/'.$hotpro->id) }}">{{ $hotpro->pro_model }}</a></p>
                </div>
              </div>
              <hr>

            </li>
            @endforeach
          </ul>
        </div>
      </div>
      
      <!--end left category nav-->
      
      <div class="col-xl-9 col-lg-9 col-md-9 productRight">
        <div class="portfolio">
          <ul>
            @foreach ($categories as $category)
            <li class="mybigclass"><span class="product_titlebg2"><i class="fa fa-angle-double-right"></i>{{ ($locale=='en') ? $category->category_name_en : $category->category_name }}</span><a href="{{ url('products-list/'.$category->id) }}"></a></li>
            <li>
              <ul>
                @foreach ($category->zi as $twoType)
                <li>
                  <div class="product_titlebg3"><span class="">{{ ($locale=='en') ? $twoType->category_name_en : $twoType->category_name}}</span><a href=""></a></div>
                  <div class="portfolio">
                    <ul class="row">
                      @foreach ($twoType->myproducts as $product)
                      <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 myheight">
                        <div class="pro-list"> <a href="{{ url('products/'.$product->id) }}">
                          <div class="imgDiv"><img class="img-fluid" src="{{ $product->pro_listimg }}" alt="{{ $product->pro_name }}" />
                            <div class="rotate"><i> </i></div>
                          </div>
                          <div class="modelDiv">
                            <div>{{ ($locale=='en') ? $product->pro_name_en : $product->pro_name }}</div>
                          </div>
                          </a> </div>
                      </li>
                      @endforeach 
                    </ul>
                  </div>
                  <div class="clearfix"></div>
                </li>  
                @endforeach                              
              </ul>
            </li>
            @endforeach
          </ul>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</section>
 @endsection
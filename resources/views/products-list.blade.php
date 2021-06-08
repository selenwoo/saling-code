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
          <li class="breadcrumb-item"><a href="/products">{{ trans('header.product') }}</a></li>
          @php
            if ($ding==$type->id)
            {
              $bigcate="<li class='breadcrumb-item active' aria-current='page'>";
              $cate_name=($locale=='en') ? $type->categorynameen : $type->category_name;
              $bigcate=$bigcate.$cate_name;
              $bigcate=$bigcate."</li>";
              echo $bigcate;
            }else
            {
              $cate_name=($locale=='en') ? $dingType->categorynameen : $dingType->category_name;
              echo '<li class="breadcrumb-item"><a href="'.url('products-list/'.$dingType->slug).'">'.$cate_name.'</a></li>';
              $small_cate_name=($locale=='en') ? $type->categorynameen : $type->category_name;
              echo '<li class="breadcrumb-item active" aria-current="page">'.$small_cate_name.'</li>';
            }
          @endphp
<!--           <li class="breadcrumb-item"><a href="{{ url('products-list/'.$ding) }}">{{ ($locale=='en') ? $type->categorynameen : $type->category_name }}</a></li>
          <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('products-list/'.$type->id) }}">{{ ($locale=='en') ? $type->categorynameen : $type->category_name }}</a></li> -->
          
        </ol>
      </nav>
    </div>
  </div>
</div>
<!-- end 导航 -->

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
                <div class="collapsed" id="e{{ $one->id }}"> <span><a class="leftmenu-ul-bg" href="{{ url('products-list/'.$one->slug) }}">{{ ($locale=='en') ? $one->categorynameen : $one->category_name }}</a></span>
                  <ul>
                    @foreach ($one->zi as $two)
                    <li><a href="{{ url('products-list/'.$two->slug) }}">{{ ($locale=='en') ? $two->categorynameen : $two->category_name }}<i class="fa fa-angle-right pull-right" aria-hidden="true"></i></a></li>
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

          document.getElementById("e{{$ding}}").className="";//清空当前ID的栏目collapsed属性，使之展开

          
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
                <div class="col-5"><a href="{{ url('products/'.$hotpro->slug) }}"><img class="img-fluid" src="{{ $hotpro->pro_listimg }}" alt="{{ ($locale=='en') ? $hotpro->pronameen : $hotpro->pro_name }}"></a></div>
                <div class="col-7">
                  <h5>TOP {{ $key+1 }}</h5>
                  <p><a href="{{ url('products/'.$hotpro->slug) }}">{{ $hotpro->pro_model }}</a></p>
                </div>
              </div>
              <hr>

            </li>
            @endforeach

          </ul>
        </div>
      </div>
      
      <!--end left category nav-->
      
      <div class="col-xl-9 col-lg-9 col-md-9">
        <div class="portfolio">
          <h3><i class="fa fa-angle-double-right"></i> {{($locale=='en') ?  $type->categorynameen : $type->category_name }}</h3>
          <ul class="row productRight">
            @foreach ($products as $product)
            <li class="col-12 col-lg-12 col-md-12 col-sm-12">
              <div class="row myflex d-flex">
                <div class="col-lg-5 col-md-5 col-sm-12 piclist align-self-center"><a href="{{ url('products/'.$product->slug) }}"><img class="img-fluid" src="{{ $product->pro_listimg }}" alt="{{ $product->pro_name }}" /></a></div>
                <div class="col-lg-7 col-md-7 col-sm-12 parameter"  style="">
                  <div class="pro-title"><h4><a href="{{ url('products/'.$product->slug) }}">{{ ($locale=='en') ? $product->pronameen : $product->pro_name }}</a></h4></div>
                  <div class="parameter-list">{!! ($locale=='en') ? $product->pro_parameter_en : $product->pro_parameter !!}</div>
                  <div class="downfile" style="">
                    
                    <div class="downfile-title"><a href="{{ $product->pro_manual }}" title="{{ ($locale=='en') ? $product->pronameen : $product->pro_name }}" target="_blank" ><i class="fa fa-file-pdf-o"></i> {{ trans('product.manual') }}</a></div>
                  </div>
                </div>
              </div>
            </li>

            @endforeach 
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</section>
 @endsection
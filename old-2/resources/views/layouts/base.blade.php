<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>@yield('title')</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="{{ trans('header.keywords') }}" name="keywords">
<meta content="{{ trans('header.descriptions') }}" name="description">
<meta content="Author" name="珠海市新霖科技有限公司">
<!-- Favicons -->
<link href="/public/img/favicon.png" rel="icon">
<link href="/public/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

<!-- Bootstrap CSS File -->
<link href="/public/lib/bootstrap/css/bootstrap.css" rel="stylesheet">

<!-- Libraries CSS Files -->
<link href="/public/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="/public/lib/animate/animate.min.css" rel="stylesheet">
<link href="/public/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="/public/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="/public/lib/magnific-popup/magnific-popup.css" rel="stylesheet">
<link href="/public/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="/public/css/carousel.css" rel="stylesheet">
<link rel="stylesheet" href="/public/lib/jcarousel/css/jcarousel.responsive.css">
<!-- Main Stylesheet File -->
<link href="/public/css/style.css" rel="stylesheet">
<!--Theme Responsive css-->
<link rel="stylesheet" href="/public/css/responsive.css" />

<!--产品侧面导航  -->
<link href="/public/css/sdmenu.css" rel="stylesheet">
<!--产品侧面导航-->
<script src="/public/js/sdmenu.js"></script>
<!--exzoom商城商品放大镜插件-->
<link rel="stylesheet" href="/public/lib/exzoom/css/jquery.exzoom.css" />
<!-- 多图轮换 -->
<link rel="stylesheet" type="text/css" href="/public/lib/jcarousel/css/jcarousel.responsive.css">
<!--the images hover style-->
<link href="/public/css/img-hover.css" rel="stylesheet">

</head>
<body id="body">

<!-- 包含页头-->
@includeIf('layouts.header',['myclass'=>@myclass])
<!-- #header --> 

<!-- 继承后插入的内容-->
@yield('content')

 <!-- 包含页脚-->
@includeIf('layouts.footer')


<!--<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a> -->

<!-- JavaScript  --> 
<script src="/public/lib/jquery/jquery.min.js"></script> 
<script src="/public/lib/jquery/jquery-migrate.min.js"></script> 
<script src="/public/lib/bootstrap/js/bootstrap.bundle.min.js"></script> 
<script src="/public/lib/easing/easing.min.js"></script> 
<script src="/public/lib/superfish/hoverIntent.js"></script> 
<script src="/public/lib/superfish/superfish.min.js"></script> 
<script src="/public/lib/wow/wow.min.js"></script> 
<script src="/public/lib/owlcarousel/owl.carousel.min.js"></script> 
<script src="/public/lib/magnific-popup/magnific-popup.min.js"></script> 
<script src="/public/lib/sticky/sticky.js"></script> 
<script src="/public/contact/jqBootstrapValidation.js"></script> 
<script src="/public/contact/contact_me.js"></script> 
<!-- 多图轮换 --> 
<script src="/public/lib/jcarousel/js/jquery.jcarousel.min.js"></script>
<script src="/public/lib/jcarousel/js/jcarousel.responsive.js"></script>
<script src="/public/js/main.js"></script> 
<!--exzoom商城商品放大镜插件--> 
<script src="/public/lib/exzoom/js/jquery.exzoom.js"></script> 
<!--产品点击分类闭合--> 
<script src="/public/js/pro-animate.js" type="text/javascript"></script> 
<script src="/public/js/jquery-migrate-1.0.0.js"></script>
<!-- 点击语言JS -->
<script src="/public/js/js.cookie.js" defer></script>
<script src="/public/js/lang-set.js" defer></script>
</body>
</html>

<script type="text/javascript">
$(function() {
    "use strict";
    $(".index-about .myimages a").on(null === $(window).ontouchstart ? "touchstart": "mouseenter mouseleave",
    function(e) {
        $(this)["mouseleave" === e.type ? "removeClass": "addClass"]("hover")
    })
});
</script>

<script type="text/javascript">

jQuery(document).ready(function() {
    $('.jcarousel').jcarouselAutoscroll({
    autostart: true,//多图轮换自动播放
  interval: 2000//自动播放间隔
});
});

$("#exzoom").exzoom({
          autoPlay: false,
      });//方法调用，务必在加载完后执行
  
</script>



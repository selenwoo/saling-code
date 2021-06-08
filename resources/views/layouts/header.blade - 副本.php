<!--==========================
    Top Bar
  ============================-->
<section id="topbar" class="d-none d-lg-block">
  <div class="container clearfix"> 
    <!--
      <div class="contact-info float-left">
        <i class="fa fa-envelope-o"></i> <a href="mailto:contact@example.com">name@websitename.com</a>
        <i class="fa fa-phone"></i> +1 2345 67855 22
      </div>
-->
    <div class="social-links float-right"> <a  class="set_language" data-language="en" href="#">EN</a> | <a class="set_language" data-language="zh-CN" href="#">CN</a> 

      <!--
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
--> 
    </div>
  </div>
</section>

<!--==========================
    Header
  ============================-->
<header id="header">
  <div class="container">
    <div id="logo" class="float-left">
      <div class="float-left"><a href="index.html"><img src="/public/img/logo.png" alt="" title="" /></a></div>
      <div class="float-left d-none d-lg-block m-l-15"><span class="d-none d-lg-block">珠海市新霖科技有限公司</span><span class="d-none d-lg-block"> Zhuhai Sailing technology co.,ltd</span></div>
    </div>
    <nav id="nav-menu-container">
      <ul class="nav-menu">
        <li><a href="/">{{ trans('header.home') }}</a></li>
        <li><a href="/about/1">{{ trans('header.about') }}</a></li>
        <li class="menu-has-children"><a href="/products">{{ trans('header.product') }}</a>
          <ul>
            <li><a href="#">{{ trans('header.products.menu01') }}</a></li>
            <li><a href="#">{{ trans('header.products.menu02') }}</a></li>
            <li><a href="#">{{ trans('header.products.menu03') }}</a></li>
            <li><a href="#">{{ trans('header.products.menu04') }}</a></li>
            <li><a href="#">{{ trans('header.products.menu05') }}</a></li>
          </ul>
        </li>
        <li><a href="news.html">{{ trans('header.support') }}</a></li>
        <li><a href="case.html">{{ trans('header.projects') }}</a></li>
        <li><a href="contact.html">{{ trans('header.contact') }}</a></li>
      </ul>
    </nav>
    <!-- #nav-menu-container --> 
  </div>
</header>
<!-- #header --> 

<!--==========================
    Top Bar
  ============================-->
<section id="topbar" class="d-none d-lg-block">
  <div class="container clearfix"> 

    <div class="social-links float-right"> <a  class="set_language" data-language="en" href="#">EN</a> | <a class="set_language" data-language="zh-CN" href="#">CN</a> 

    </div>
  </div>
</section>

<!--==========================
    Header
  ============================-->
<header id="header">
  <div class="container">
    <div id="logo" class="float-left">
      <div class="float-left"><a href="/"><img src="/public/img/logo.png" alt="" title="" /></a></div>
      <div class="float-left d-none d-lg-block m-l-15"><span class="d-none d-lg-block">珠海市新霖科技有限公司</span><span class="d-none d-lg-block"> Zhuhai Sailing technology co.,ltd</span></div>
    </div>
    <nav id="nav-menu-container">
      <ul class="nav-menu">
        
        <li><a href="/">{{ trans('header.home') }}</a></li>
        <li><a href="/about">{{ trans('header.about') }}</a></li>
        <li class="menu-has-children"><a href="/products">{{ trans('header.product') }}</a>
          <ul>
            @foreach ($categories as $category)
            <li><a href="{{ url('products-list/'.$category->id) }}">{{ ($locale=='en') ? $category->category_name_en : $category->category_name }}</a></li>
            @endforeach
          </ul>
        </li>
        <li><a href="/support">{{ trans('header.support') }}</a></li>
        <li><a href="/projects">{{ trans('header.projects') }}</a></li>
        <li><a href="/contact">{{ trans('header.contact') }}</a></li>

      </ul>
    </nav>
    <!-- #nav-menu-container --> 
  </div>
</header>
<!-- #header --> 


<!--==========================
    Footer
  ============================-->
<footer id="footer" class="footer action-lage bg-black p-top-80">
  <div class="container">
    <div class="row">
<!--
      <div class="col-lg-3">
        <div class="widget_item widget_about">
          <h5 class="text-white">关于我们</h5>
          <p class="m-top-30">珠海市新霖科技有限公司是一家专业从事LED智能调光技术产品的研发，生产，销售及售后服务的高新技术企业。公司主要生产，可控硅/Triac 调光电源，0-10V调光电源，DALI调光驱动及无线控制产品等。产品兼容路创、邦奇、飞利浦、欧司朗、奇胜、施耐德、等系统。<a href="about.html">了解更多</a></p>
        </div>
      </div>
-->
	  <div class="col-lg-3 col-6">
        <div class="widget_item widget_service sm-m-top-50">
          <h5 class="text-white">{{ trans('footer.navigation') }}</h5>
          <ul class="m-top-20">
            <li class="m-top-10"> <a href="/"><i class="fa fa-angle-right"></i> {{ trans('footer.navigations.home') }}</a></li>
            <li class="m-top-10"> <a href="/about"><i class="fa fa-angle-right"></i> {{ trans('footer.navigations.about') }}</a></li>
            <li class="m-top-10"> <a href="/support"><i class="fa fa-angle-right"></i> {{ trans('footer.navigations.support') }}</a></li>
            <li class="m-top-10"> <a href="/projects"><i class="fa fa-angle-right"></i> {{ trans('footer.navigations.projects') }}</a></li>
			<li class="m-top-10"> <a href="/public/download/pdf/catalogue.pdf"><i class="fa fa-angle-right"></i> {{ trans('footer.navigations.catalogue') }}</a></li>
          </ul>
        </div>
      </div>
	  <div class="col-lg-3 col-6">
        <div class="widget_item widget_service sm-m-top-50">
          <h5 class="text-white">{{ trans('footer.product') }}</h5>
          <ul class="m-top-20">
            @foreach ($categories as $category)
            <li class="m-top-10"><a href="{{ url('products-list/'.$category->id) }}"><i class="fa fa-angle-right"></i> {{ ($locale=='en') ? $category->category_name_en : $category->category_name }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="widget_item widget_latest sm-m-top-50">
          <h5 class="text-white">{{ trans('footer.contact') }}</h5>
          <div class="widget_ab_item">
            <div class="item_icon"><i class="fa fa-map-marker"></i></div>
            <div class="widget_ab_item_text">
              <p>{{ trans('footer.contacts.add') }}</p>
            </div>
          </div>
          <div class="widget_ab_item">
            <div class="item_icon"><i class="fa fa-phone"></i></div>
            <div class="widget_ab_item_text">
              <p>+86-756-8305964</p>
            </div>
          </div>
		  <div class="widget_ab_item">
            <div class="item_icon"><i class="fa fa-mobile"></i></div>
            <div class="widget_ab_item_text">
              <p>+86-13680337300</p>
            </div>
          </div>
		  <div class="widget_ab_item">
            <div class="item_icon"><i class="fa fa-fax"></i></div>
            <div class="widget_ab_item_text">
              <p>+86-756-8305964</p>
            </div>
          </div>
          <div class="widget_ab_item">
            <div class="item_icon"><i class="fa fa-envelope-o"></i></div>
            <div class="widget_ab_item_text">
              <p>info@ledsailing.com</p>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-lg-3">
        <div class="widget_item widget_newsletter sm-m-top-50">
          <h5 class="text-white">Newsletter</h5>
          <form class="form-inline m-top-30" action="{{ url('newsletter-post') }}" method="POST">
            {!! csrf_field() !!}
            <div class="form-group">
              <input type="email" name="email" class="form-control" placeholder="Enter you Email">
              <button type="submit" class="btn text-center"><i class="fa fa-arrow-right"></i></button>
            </div>
          </form>
          <div class="widget_brand m-top-20">
            <div><a href="#"><img src="/public/img/logo.png" alt="" title="" /></a></div>
            <p>{{ trans('footer.kouhao') }}</p>
          </div>
          <ul class="follow-me m-top-20">
            <li>- <a href=""><i class="fa fa-facebook"></i></a></li>
            <li><a href=""><i class="fa fa-twitter"></i></a></li>
            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
            <li><a href=""><i class="fa fa-behance"></i></a></li>
            <li><a href=""><i class="fa fa-dribbble"></i></a> - </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="main_footer fix bg-mega text-center p-top-40 p-bottom-10 m-top-80">
    <div class="col-md-12">
      <p class="wow fadeInRight" data-wow-duration="1s"> {!! trans('footer.copyright') !!} </p>
    </div>
  </div>
</footer>
@php
   $locale=App::getLocale();

@endphp


<!--悬浮链接-->
{!! ($locale=='en') ? '<script src=\'/public/js/kefu-en.js\'></script>' : '<script src=\'/public/js/kefu.js\'></script>' !!}


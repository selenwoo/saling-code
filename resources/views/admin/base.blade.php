<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新霖科技后台管理-@yield('title')</title>
    <link rel="stylesheet" href="/public/admin/vendor/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="/public/admin/vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/public/admin/css/styles.css">
    <!-- Favicons -->
<link href="/public/img/favicon.png" rel="icon">
<link href="/public/img/apple-touch-icon.png" rel="apple-touch-icon">

</head>
<body class="sidebar-fixed header-fixed">

<div class="page-wrapper">
<!--    包含顶部-->
	@includeIf('admin.header')

    <div class="main-container">
        <div class="sidebar">
             <!-- 包含侧面导航-->
			@includeIf('admin.sidebar')
        </div>

        <div class="content">
<!--            content-->
			<!-- 继承后插入的内容-->
@yield('content')
        </div>
    </div>
</div>
<script src="/public/admin/vendor/jquery/jquery.min.js"></script>
<script src="/public/admin/vendor/popper.js/popper.min.js"></script>
<script src="/public/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/public/admin/vendor/chart.js/chart.min.js"></script>
<script src="/public/admin/js/carbon.js"></script>
<script src="/public/admin/js/demo.js"></script>
<script src="/public/layer/layer.js"></script>

</body>
</html>
<script>
  $('#parentIframe').on('click', function(){
    layer.open({
      type: 2,
      title: '上传多张图片',
      maxmin: true,
      shadeClose: true, //点击遮罩关闭层
      area : ['800px' , '520px'],
      content: '{{ url('admin/upload-multi-form') }}'//打开上传窗口
      });
});

  $('#uploadIframe').on('click', function(){
    layer.open({
      type: 2,
      title: '上传一张图片',
      maxmin: true,
      shadeClose: true, //点击遮罩关闭层
      area : ['800px' , '520px'],
      content: '{{ url('admin/upload-one-form') }}'//打开上传窗口
      });
});
    $('#uploadPdfIframe').on('click', function(){
    layer.open({
      type: 2,
      title: '上传产品说明书PDF文件',
      maxmin: true,
      shadeClose: true, //点击遮罩关闭层
      area : ['800px' , '520px'],
      content: '{{ url('admin/upload-pdf-form') }}'//打开上传窗口
      });
});
</script>
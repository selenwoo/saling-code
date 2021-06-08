<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>upload form</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
<link rel="stylesheet" href="/public/admin/vendor/simple-line-icons/css/simple-line-icons.css">
<link rel="stylesheet" href="/public/admin/vendor/font-awesome/css/fontawesome-all.min.css">
<link rel="stylesheet" href="/public/admin/css/styles.css">
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<body>
	<h3>Your file was successfully uploaded!</h3>

</body>
</html>
<script src="/public/admin/vendor/jquery/jquery.min.js"></script>
<script src="/public/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/public/layer/layer.js"></script>
<script> window.parent.document.getElementById('product-manual').value = "{{ $upload_data }}";  </script>
<script type="text/javascript">


	layui.use(['form','layer'], function(){
            $ = layui.jquery;
          var form = layui.form
          ,layer = layui.layer;
        
            layer.alert("操作成功", {icon: 6},function () {
                // 获得frame索引
                var index = parent.layer.getFrameIndex(window.name);
                //设置localStorage
				
                //localStorage.setItem("orderId",data.orderId);
                //关闭当前frame
                parent.layer.close(index);
                //layer.closeAll(); //疯狂模式，关闭所有层
            });         
                  
        });

</script>

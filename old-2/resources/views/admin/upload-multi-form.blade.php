<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<link rel="stylesheet" href="/public/admin/vendor/simple-line-icons/css/simple-line-icons.css">
<link rel="stylesheet" href="/public/admin/vendor/font-awesome/css/fontawesome-all.min.css">
<link rel="stylesheet" href="/public/admin/css/styles.css">
<style type="text/css">
.file-box {
	position: relative;
	width: 340px;
	margin: 20px;
}
.txt {
	height: 28px;
	line-height: 28px;
	border: 1px solid #cdcdcd;
	width: 180px;
}
.btn {
	width: 70px;
	color: #fff;
	background-color: #3598dc;
	border: 0 none;
	height: 28px;
	line-height: 16px!important;
	cursor: pointer;
}
.btn:hover {
	background-color: #63bfff;
	color: #fff;
}
.file {
	position: absolute;
	top: 0;
	right: 85px;
	height: 30px;
	line-height: 30px;
filter:alpha(opacity:0);
	opacity: 0;
	width: 254px
}
</style>
</head>

<body>


    <div class="file-box">
      <form id="uploadForm" action="{{ url('admin/image-upload-post') }}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="col-md-12">
          <div class="form-group">
            <label for="product-photo" class="form-control-label">产品图片</label>
            <input type="file" class="form-control" id="product-photo" name="product-photo[]" placeholder="photo" multiple="multiple" onchange="houseImgOne(this)">
            <img id="imgone" class="sz"  height="100px" src="" style="display: none;"> </div>
        </div>
		  <div class="col-md-12"><button id="mybtn" class="btn btn-info">提交</button></div>
      </form>
    </div>
</body>
</html>
<script src="/public/admin/vendor/jquery/jquery.min.js"></script>
<script src="/public/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/public/layer/layer.js"></script>
<script> 
	//给父页面传值
$('#mybtn').on('click', function(){
    parent.$('#proimage_multi').text('上传中...');
    //parent.layer.tips('Look here', '#proimage_multi', {time: 5000});
    parent.layer.close(index);
});
	//window.parent.document.getElementById('proimage_multi').value = "test";  
</script>
<script>
  var _btnId = '';
  var all_urls="";
  var all_types="";
  function houseImgOne(_this) {
    var img = '<img class="sz"  height="100px" src=""  >' 
    _btnId = $(_this).attr('id');
    var obj = document.getElementById("product-photo");
    var length = obj.files.length;
    //多图上传时遍历文件信息（可以通过object.files查看）
    for (var i = 0; i < length; i++) {
      var objUrl = getObjectURL(_this.files[i]);
      //图片后缀类型拼接
      all_types=all_types+_this.files[i].type;
      //将图片转换成base64自字符
      var oFReader = new FileReader();
      oFReader.readAsDataURL(_this.files[i]);
      oFReader.onload = function (oFREvent) {
        all_urls=all_urls+oFREvent.target.result+"&|||"; //拼接data形式base64的url
      };

      if (objUrl) {
        $('.sz:last').before(img);
        $('.sz').eq($(".sz").length - 2).attr("src", objUrl);
      }
    }
  }
  //点击提交按钮触发ajax
    $(".submit").click(function(){
    //console.log(all_types);
    $.ajax({
      type:"post",
      url:"{{url('admin/img')}}",
      data:{'imgs':all_urls,'types':all_types,'_token':"{{csrf_token()}}"}, 
      dataType:"json",
      success:function(data){
        if (data==1){
          // layer插件提示，可自行选择则
          layer.msg("上传成功", {icon: 6});
          window.location.reload();
        }else {
          alert("上传失败！");
        }
      }
    });
  });
  //获取blog对象url(实际获取的是缓存中的图片路径信息，用于即时显示，并非服务器返回的实际资源路径)
  function getObjectURL(file) {
    var url = null;
    if (window.createObjectURL != undefined) {
      url = window.createObjectURL(file);
    } else if (window.URL != undefined) {
      url = window.URL.createObjectURL(file);
    } else if (window.webkitURL != undefined) {
      url = window.webkitURL.createObjectURL(file);
    }
    return url;
  }
</script>
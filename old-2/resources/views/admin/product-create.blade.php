
@extends('admin.base')

@section('title', '添加产品')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">新增产品</div>
                <div class="card-body">

                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>新增失败</strong> 输入不符合要求<br><br>
                        {!! implode('<br>', $errors->all()) !!}
                    </div>
                    @endif

                    <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="product-category">分类</label>
                                    <select id="product-category" name="product-category" class="form-control">
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ str_repeat('|--',$category->level) }}{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="product-model" class="form-control-label">型号</label>
                                    <input id="product-model" name="product-model" class="form-control" value="{{ old('product-model') }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="product-name" class="form-control-label">产品名</label>
                                    <input id="product-name" name="product-name" class="form-control" value="{{ old('product-name') }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="product-name-en" class="form-control-label">英文产品名</label>
                                    <input id="product-name-en" name="product-name-en" class="form-control" value="{{ old('product-name-en') }}">
                                </div>
                            </div>
                            

                            <div class="col-8">
                                <div class="form-group">
                                    <label for="proimage_one">产品列表图片</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" id="proimage_one" name="proimage_one" value="{{ old('proimage_one') }}">      
                                        <a class="btn btn-info" href="javascript:" id="uploadIframe">上传列表图</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="product-sort" class="form-control-label">排序</label>
                                    <input id="product-sort" name="product-sort" class="form-control" value="{{ old('product-sort') }}">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="product-photo" class="form-control-label">产品图片集</label>
                                    <div class="input-group">
                                    <textarea id="proimage_multi" name="proimage_multi" class="form-control" rows="1">{{ old('proimage_multi') }}</textarea>
                                    <a class="btn btn-info" href="javascript:" id="parentIframe">上传多张图</a>
                                    </div>
                                </div>                            
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="product-feature" class="form-control-label">产品特点</label>
                                    <!-- <textarea id="product-feature" name="product-feature" class="form-control" rows="6">{{ old('product-feature') }}</textarea> -->
                                    <script id="product-feature" name="product-feature" type="text/plain">
                                        {!! old('product-feature') !!}
                                    </script>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="product-feature-en" class="form-control-label">产品特点-英文</label>
                                    <!-- <textarea id="product-feature-en" name="product-feature-en" class="form-control" rows="6">{{ old('product-feature-en') }}</textarea> -->
                                    <script id="product-feature-en" name="product-feature-en" type="text/plain">
                                        {!! old('product-feature-en') !!}
                                    </script>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="product-intro" class="form-control-label">产品描述</label>
                                    <!-- <textarea id="product-intro" name="product-intro" class="form-control" rows="12">{{ old('product-intro') }}</textarea> -->
                                    <script id="product-intro" name="product-intro" type="text/plain">
                                        {!! old('product-intro') !!}
                                    </script>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="product-intro-en" class="form-control-label">产品描述-英文</label>
                                    <!-- <textarea id="product-intro-en" name="product-intro-en" class="form-control" rows="12">{{ old('product-intro-en') }}</textarea> -->
                                    <script id="product-intro-en" name="product-intro-en" type="text/plain">
                                        {!! old('product-intro-en') !!}
                                    </script>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="product-parameter" class="form-control-label">产品参数</label>
                                    <!-- <textarea id="product-parameter" name="product-parameter" class="form-control" rows="12">{{ old('product-parameter') }}</textarea> -->
                                    <script id="product-parameter" name="product-parameter" type="text/plain">
                                        {!! old('product-parameter') !!}
                                    </script>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="product-parameter-en" class="form-control-label">产品参数-英文</label>
                                    <!-- <textarea id="product-parameter-en" name="product-parameter-en" class="form-control" rows="12">{{ old('product-parameter-en') }}</textarea> -->
                                    <script id="product-parameter-en" name="product-parameter-en" type="text/plain">
                                        {!! old('product-parameter-en') !!}
                                    </script>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="product-manual">产品说明书下载</label>
                                    <div class="input-group">                                    
                                    <input class="form-control" type="text" name="product-manual" id="product-manual" value="{{ old('product-manual') }}">
                                    <span class="input-group-btn"><a class="btn btn-info" href="javascript:" id="uploadPdfIframe">上传PDF</a></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group toggle-switch" data-ts-color="primary">
                                    <label for="ifhot" class="ts-label">是否推荐</label>
                                    <input id="ifhot" name="ifhot" type="checkbox" hidden="hidden" value="1">
                                    <label for="ifhot" class="ts-helper"></label>
                                </div>
                            </div>

                             <div class="col-12"><button class="btn btn-info">提交</button></div>   
                                
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>             

    </div>
@include('vendor.UEditor.head')<!-- 引入百度编辑器js文件 -->
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('product-feature');
    var ue1 = UE.getEditor('product-feature-en');
    var ue2 = UE.getEditor('product-intro');
    var ue3 = UE.getEditor('product-intro-en');
    var ue4 = UE.getEditor('product-parameter');
    var ue5 = UE.getEditor('product-parameter-en');
        ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.    
    });
</script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
<script type="text/javascript">
    $("#uploadFile").change(function () {
        $('#image_preview').html("");
        let total_file = document.getElementById("uploadFile").files.length;
        for (let i = 0; i < total_file; i++) {
            $('#image_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "'>");
        }
    });
    $('form').ajaxForm(function () {
        alert("上传成功");
    });
</script>
<style type="text/css">
        input[type=file] {
            display: inline;
        }
        #image_preview {
            padding: 10px;
        }
        #image_preview img {
            width: 200px;
            padding: 5px;
        }
    </style>
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
</script> -->
@endsection    

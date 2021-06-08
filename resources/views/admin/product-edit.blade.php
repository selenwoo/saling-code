
@extends('admin.base')

@section('title', '修改产品')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">修改产品</div>
                <div class="card-body">

                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>保存失败</strong> 输入不符合要求<br><br>
                        {!! implode('<br>', $errors->all()) !!}
                    </div>
                    @endif

                    <form action="{{ url('admin/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="product-model" class="form-control-label">型号</label>
                                    <input id="product-model" name="product-model" class="form-control" value="{{ $product->pro_model }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="product-name" class="form-control-label">产品名</label>
                                    <input id="product-name" name="product-name" class="form-control" value="{{ $product->pro_name }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="product-name-en" class="form-control-label">英文产品名</label>
                                    <input id="product-name-en" name="product-name-en" class="form-control" value="{{ $product->pronameen }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="product-category">分类</label>
                                    <select id="product-category" name="product-category" class="form-control">
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @php if ($category->id==$product->pro_category) {echo'selected="selected"';} @endphp >{{ str_repeat('|--',$category->level) }}{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-8">
                                <div class="form-group">
                                    <label for="proimage_one">产品列表图片</label>
                                    <div class="input-group"> 
                                    <input class="form-control" type="text" id="proimage_one" name="proimage_one" value="{{ $product->pro_listimg }}">
                                    <a class="btn btn-info" href="javascript:" id="uploadIframe">上传列表图</a>
                                    </div>
                                </div>

                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="product-sort" class="form-control-label">排序(同类产品中的排序)</label>
                                    <input id="product-sort" name="product-sort" class="form-control" value="{{ $product->pro_sort }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="product-photo" class="form-control-label">产品图片集</label>
                                    <div class="input-group"> 
                                    <textarea id="proimage_multi" name="proimage_multi" class="form-control" rows="2">{{ $product->pro_img }}</textarea>
                                    <a class="btn btn-info" href="javascript:" id="parentIframe">上传多张图</a>
                                    </div>
                                </div>                            
                            </div>
                            
                            
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="product-feature" class="form-control-label">产品特点</label>
                                    <script id="product-feature" name="product-feature" type="text/plain">
                                        {!! $product->pro_feature!!}
                                    </script>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="product-feature-en" class="form-control-label">产品特点-英文</label>
                                    
                                    <script id="product-feature-en" name="product-feature-en" type="text/plain">
                                        {!! $product->pro_feature_en !!}
                                    </script>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="product-intro" class="form-control-label">产品描述</label>
                                    <script id="product-intro" name="product-intro" type="text/plain">
                                        {!! $product->pro_intro !!}
                                    </script>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="product-intro-en" class="form-control-label">产品描述-英文</label>
                                    <script id="product-intro-en" name="product-intro-en" type="text/plain">
                                        {!! $product->pro_intro_en !!}
                                    </script>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="product-parameter" class="form-control-label">产品参数</label>
                                    <script id="product-parameter" name="product-parameter" type="text/plain">
                                        {!! $product->pro_parameter !!}
                                    </script>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="product-parameter-en" class="form-control-label">产品参数-英文</label>
                                    <script id="product-parameter-en" name="product-parameter-en" type="text/plain">
                                        {!! $product->pro_parameter_en !!}
                                    </script>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="product-manual">产品说明书下载</label>
                                    <div class="input-group"> 
                                    <input class="form-control" type="text" name="product-manual" id="product-manual" value="{{ $product->pro_manual }}">
                                    <span class="input-group-btn"><a class="btn btn-info" href="javascript:" id="uploadPdfIframe">上传PDF</a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group toggle-switch" data-ts-color="primary">
                                    <label for="ifhot" class="ts-label">是否推荐</label>
                                    <input id="ifhot" name="ifhot" type="checkbox" hidden="hidden" {{ ($product->pro_ifhot)?"checked='true'":"" }} value="1">
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


@endsection    

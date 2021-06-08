
@extends('admin.base')

@section('title', '添加案例')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">新增案例</div>
                <div class="card-body">

                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>新增失败</strong> 输入不符合要求<br><br>
                        {!! implode('<br>', $errors->all()) !!}
                    </div>
                    @endif

                    <form action="{{ url('admin/projects') }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="row">
                            
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="project-name" class="form-control-label">案例名</label>
                                    <input id="project-name" name="project-name" class="form-control" value="{{ old('project-name') }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="project-name-en" class="form-control-label">英文案例名</label>
                                    <input id="project-name-en" name="project-name-en" class="form-control" value="{{ old('project-name-en') }}">
                                </div>
                            </div>

                            <div class="col-8">
                                <div class="form-group">
                                    <label for="proimage_one">案例列表图片</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" id="proimage_one" name="proimage_one" value="{{ old('proimage_one') }}">      
                                        <a class="btn btn-info" href="javascript:" id="uploadIframe">上传列表图</a>
                                    </div>
                                </div>
                            </div>
                                                        
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="project-photo" class="form-control-label">案例图片集</label>
                                    <div class="input-group">
                                    <textarea id="proimage_multi" name="proimage_multi" class="form-control" rows="1">{{ old('proimage_multi') }}</textarea>
                                    <a class="btn btn-info" href="javascript:" id="parentIframe">上传多张图</a>
                                    </div>
                                </div>                            
                            </div>
                            
                            
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="project-intro" class="form-control-label">案例描述</label>
                                    <textarea id="project-intro" name="project-intro" class="form-control" rows="12">{!! old('project-intro') !!}</textarea>
                                    
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="project-intro-en" class="form-control-label">案例描述-英文</label>
                                    <textarea id="project-intro-en" name="project-intro-en" class="form-control" rows="12">{!! old('project-intro-en') !!}</textarea>
                                    
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

    var ue2 = UE.getEditor('project-intro');
    var ue3 = UE.getEditor('project-intro-en');

        ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.    
    });
</script>

@endsection    

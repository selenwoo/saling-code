
@extends('admin.base')

@section('title', '修改技术支持')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">修改术支持</div>
                <div class="card-body">

                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>修改失败</strong> 输入不符合要求<br><br>
                        {!! implode('<br>', $errors->all()) !!}
                    </div>
                    @endif

                    <form action="{{ url('admin/support/'.$support->id) }}" method="POST" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {!! csrf_field() !!}
                        <div class="row">
                            
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="support-title" class="form-control-label">标题</label>
                                    <input id="support-title" name="support-title" class="form-control" value="{{ $support->support_title }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="support-title-en" class="form-control-label">英文标题</label>
                                    <input id="support-title-en" name="support-title-en" class="form-control" value="{{ $support->support_title_en }}">
                                </div>
                            </div>

                           
                                                        
                            
                            
                            
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="support-content" class="form-control-label">技术支持描述</label>
                                    <textarea id="support-content" name="support-content" class="form-control" rows="12">{!! $support->support_content !!}</textarea>
                                    
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="support-content-en" class="form-control-label">技术支持描述-英文</label>
                                    <textarea id="support-content-en" name="support-content-en" class="form-control" rows="12">{!! $support->support_content_en !!}</textarea>
                                    
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

    var ue2 = UE.getEditor('support-content');
    var ue3 = UE.getEditor('support-content-en');

        ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.    
    });
</script>

@endsection    

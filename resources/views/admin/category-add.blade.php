
@extends('admin.base')

@section('title', '添加产品分类')

@section('content')
<div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                <div class="panel-heading">新增子分类</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>新增失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <form action="{{ url('admin/category') }}" method="POST">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="category-name" class="form-control-label">分类名</label>
                            <input id="category-name" name="category-name" class="form-control" value="">
                         </div>
                         <div class="form-group">
                            <label for="category-name-en" class="form-control-label">英文分类名</label>
                            <input id="category-name-en" name="category-name-en" class="form-control" value="">
                         </div>
                         <div class="form-group">
                            <label for="category-parent" class="form-control-label">父分类</label>
                            <input id="category-parent" name="category-parent" class="form-control" value="{{ $category->category_name }}">
                         </div>
                         <div class="form-group">
                            <label for="category-sort" class="form-control-label">排序</label>
                            <input id="category-sort" name="category-sort" class="form-control" value="">
                         </div>
                        <button class="btn btn-lg btn-info">提交</button>
                    </form>

                </div>
            </div>
                    </div>
                </div>             

 </div>
@endsection
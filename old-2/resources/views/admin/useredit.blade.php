
@extends('admin.base')

@section('title', '修改用户')

@section('content')
<div class="container-fluid">
                <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">修改用户</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>修改失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <form action="{{ url('admin/user/'.$user->id) }}" method="POST">
                        {{ method_field('PATCH') }}
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="user-name" class="form-control-label">用户名</label>
                            <input id="user-name" name="user-name" class="form-control" value="{{ $user->name }}">
                         </div>
                         <div class="form-group">
                            <label for="user-email" class="form-control-label">邮箱</label>
                            <input id="user-email" name="user-email" class="form-control" value="{{ $user->email }}">
                         </div>
                         
                        <button class="btn btn-lg btn-info">保存修改</button>
                    </form>

                </div>
            </div>
        </div>
    </div>             

 </div>
@endsection
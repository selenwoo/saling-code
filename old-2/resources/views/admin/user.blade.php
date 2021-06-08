
@extends('admin.base')

@section('title', '管理员')

@section('content')
<div class="container-fluid">
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>用户名</th>
                                        <th>E-mail</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($user as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td class="text-nowrap">{{ $value->name }}</a></td>
                                        <td class="text-nowrap">{{ $value->email }}</a></td>
                                        <td>                                            
                                            <a href="{{ url('admin/user/'.$value->id.'/edit') }}" class="btn btn-primary">编辑</a>
                                        </td>
                                    </tr>
                                    @endforeach                                    
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div> 



 </div>
@endsection
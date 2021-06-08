
@extends('admin.base')

@section('title', '技术支持')

@section('content')
<div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"><a class="btn btn-info" href="support/create">添加技术支持</a></div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>标题</th>
                                        <th>英文标题</th>
                                        
                                        <th>创建时间</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($support as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td class="text-nowrap"><a href="{{ url('support/'.$value->id) }}" target="_blank"> {{ $value->support_title }}</a></td>
                                        <td>{{ $value->support_title_en }}</td>

                                        <td>{{ $value->created_at }}</td>
                                        <td>
                                            <a href="{{ url('admin/support/'.$value->id.'/edit') }}" class="btn btn-primary">编辑</a>                                           
                                            <form action="{{ url('admin/$support/'.$value->id) }}" method="POST" style="display: inline;">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger">删除</button>
                                            </form>

                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <hr><div class="panel-body">{{ $support->links() }}</div>
                        </div>
                    </div>
                </div> 



 </div>
@endsection
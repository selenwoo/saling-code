
@extends('admin.base')

@section('title', '案例列表')

@section('content')
<div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"><a class="btn btn-info" href="projects/create">添加案例</a></div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>项目标题</th>
                                        <th>项目英文标题</th>
                                        
                                        <th>创建时间</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($projects as $project)
                                    <tr>
                                        <td>{{ $project->id }}</td>
                                        <td class="text-nowrap"><a href="{{ url('project/'.$project->id) }}" target="_blank"> {{ $project->project_title }}</a></td>
                                        <td>{{ $project->project_title_en }}</td>

                                        <td>{{ $project->created_at }}</td>
                                        <td>
                                            <a href="{{ url('admin/projects/'.$project->id.'/edit') }}" class="btn btn-primary">编辑</a>                                           
                                            <form action="{{ url('admin/$projects/'.$project->id) }}" method="POST" style="display: inline;">
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
                            <hr><div class="panel-body">{{ $projects->links() }}</div>
                        </div>
                    </div>
                </div> 



 </div>
@endsection
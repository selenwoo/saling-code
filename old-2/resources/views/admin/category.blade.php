
@extends('admin.base')

@section('title', '产品分类列表')

@section('content')
<div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>分类名</th>
                                        <th>分类英文名</th>
                                        <th>path路径</th>
                                        <th>排序</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td class="text-nowrap">{{ str_repeat('|--',$category->level) }}<a href="{{ url('admin/products-list/'.$category->id) }}"> {{ $category->category_name }}</a></td>
                                        <td>{{ $category->category_name_en }}</td>
                                        <td>{{ $category->category_path }}</td>
                                        <td>{{ $category->category_sort }}</td>
                                        <td>
                                            <a href="{{ url('admin/category/'.$category->id.'/edit') }}" class="btn btn-primary">编辑</a>
                                            <!-- <a href="{{ url('admin/category/'.$category->id.'/add') }}" class="btn btn-info">添加子类</a> -->
                                            <a href="/admin/category/create?pid={{$category->id}}&path={{$category->category_path}}{{$category->id}}," class="btn btn-info">添加子类</a>
                                            <form action="{{ url('admin/category/'.$category->id) }}" method="POST" style="display: inline;">
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
                </div> 


                <!-- <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th align="left">分类名称</th>
                                <th align="left">英文名称</th>
                                <th align="left">父目录ID</th>
                                <th align="left">排序</th>
                                <th align="left">操作</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        @foreach($categories as $k => $v)
                        <tr>
                            <td align="left">{{str_repeat('|--',$v->level)}}<a href="">{{$v->category_name}} </a></td>
                            <td>{{$v->category_name_en}}</td>
                            <td>{{$v->category_parent_id}}</td>
                            <td align="left">{{$v->category_sort}}</td>
                            <td align="left">
                                <a href="{{ url('admin/category/'.$v->id.'/edit') }}" class="btn btn-info">编辑</a>  
                                <a href="{{ url('admin/category/'.$v->id.'/add') }}" class="btn btn-info">添加子类</a>  
                                <form action="{{ url('admin/category/'.$v->id) }}" method="POST" style="display: inline;">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-info">删除</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach  
                    </tbody>
                </table>
            </div> -->
 </div>
@endsection

@extends('admin.base')

@section('title', '产品分类列表')

@section('content')
<div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"><a class="btn btn-info" href="products/create">添加产品</a></div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>产品名</th>
                                        <th>产品-英文</th>
                                        <th>所属分类</th>
                                        <th>创建时间</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td class="text-nowrap"><a href="{{ url('products/'.$product->id) }}" target="_blank"> {{ $product->pro_name }}</a></td>
                                        <td>{{ $product->pro_name_en }}</td>
                                        <td>{{ $product->category_name }}</td>
                                        <td>{{ $product->created_at }}</td>
                                        <td>
                                            <a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="btn btn-primary">编辑</a>                                           
                                            <form action="{{ url('admin/products/'.$product->id) }}" method="POST" style="display: inline;">
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
                            <hr><div class="panel-body">{{ $products->links() }}</div>
                        </div>
                    </div>
                </div> 



 </div>
@endsection
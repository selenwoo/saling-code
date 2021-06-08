
@extends('admin.base')

@section('title', '留言列表')

@section('content')
<div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        {!! implode('<br>', $errors->all()) !!}
                    </div>
                    @endif
                </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>留言者</th>                                        
                                        <th>创建时间</th>
                                        <th>内容</th>
                                        <th>IP</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->id }}</td>
                                        <td class="text-nowrap">{{ $contact->contact_fullname }}</td>


                                        <td>{{ $contact->created_at }}</td>
                                        <td>{{ $contact->contact_content }}</td>
                                        <td>{{ $contact->ip }}</td>
                                        <td>
                                           
                                            <form action="{{ url('admin/contact/'.$contact->id) }}" method="POST" style="display: inline;">
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
                            <hr><div class="panel-body">{{ $contacts->links() }}</div>
                        </div>
                    </div>
                </div> 



 </div>
@endsection

@extends('admin.base')

@section('title', '公司介绍')

@section('content')
<div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-light">
                                修改公司介绍
                            </div>

                            <div class="card-body">
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>修改失败</strong> 输入不符合要求<br><br>
                                {!! implode('<br>', $errors->all()) !!}
                                </div>
                            @endif                            
                                <form action="{{ url('admin/company/'.$companies->id) }}" method="POST">
                                {{ method_field('PATCH') }}
                                {!! csrf_field() !!}
                                <div class="row mt-4">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="company-add" class="form-control-label">公司地址</label>
                                            <input id="company-add" name="company-add" class="form-control" placeholder="输入公司地址" value="{{ $companies->company_add }}">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="company-add-en" class="form-control-label">公司地址-英文</label>
                                            <input id="company-add-en" name="company-add-en" class="form-control" placeholder="输入公司地址" value="{{ $companies->company_add_en }}">
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="company-tel" class="form-control-label">公司电话</label>
                                            <input id="company-tel" name="company-tel" class="form-control" placeholder="输入公司电话" value="{{ $companies->company_tel }}">
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="company-phone" class="form-control-label">公司手机</label>
                                            <input id="company-phone" name="company-phone" class="form-control" placeholder="输入公司手机" value="{{ $companies->company_phone }}">
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="company-fax" class="form-control-label">公司传真</label>
                                            <input id="company-fax" name="company-fax" class="form-control" placeholder="输入公司传真" value="{{ $companies->company_fax }}">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="company-email" class="form-control-label">公司Email</label>
                                            <input id="company-email" name="company-email" class="form-control" placeholder="输入公司Email" value="{{ $companies->company_email }}">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">                            
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="company-intro">公司介绍</label>
                                            <textarea id="company-intro" name="company-intro" class="form-control" rows="12">
                                                {{ $companies->company_intro }}
                                            </textarea>
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="company-intro-en">公司介绍-英文</label>
                                            <textarea id="company-intro-en" name="company-intro-en" class="form-control" rows="12">
                                                {{ $companies->company_intro_en }}
                                            </textarea>
                                        </div>
                                        <button class="btn btn-primary">提交</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>             

 </div>
@endsection
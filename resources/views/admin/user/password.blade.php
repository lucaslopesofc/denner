@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Painel Administrativo <small>Configurações</small></h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><a> Configurações</a></li>
        <li class="active"><a> Alterar Senha</a></li>
    </ol>
@stop

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
        {!! $message !!}
    </div>
    <?php Session::forget('success');?>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Error!</h4>
        {!! $message !!}
    </div>
    <?php Session::forget('error');?>
@endif

<div class="row">
    <div class="col-md-6" style="float: none;margin: 0 auto;">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Alterar Senha do Usuário</h3>
            </div>
            <!-- /.box-header -->
        
            <!-- form start -->
            @foreach ($user as $u)
                <form action="{{ route('admin.config.user.password.update', $u->id) }}" method="POST" role="form">
                    {{ csrf_field() }}
                    <div class="box-body">

                        <div class="form-group">
                            <label>Senha Atual</label>
                            <input type="password" name="password" class="form-control">
                            @if ($errors->has('password'))
                                <span class="text-red">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Nova Senha</label>
                                    <input type="password" name="newPassword" class="form-control">
                                    @if ($errors->has('newPassword'))
                                        <span class="text-red">
                                            <strong>{{ $errors->first('newPassword') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="col-xs-6">
                                    <label>Repita a Senha</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="text-red">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Alterar Senha</button>
                    </div>
                </form>
            @endforeach
        </div>
        <!-- /.box -->
    </div>

</div>
@stop
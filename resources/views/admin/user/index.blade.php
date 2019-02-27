@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Painel Administrativo <small>Informações</small></h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><a> Configurações</a></li>
        <li class="active"><a> Usuário</a></li>
    </ol>
@stop

@section('content')
<style type="text/css">
    .fileUpload {
        position: relative;
        overflow: hidden;
        margin-top: 20px;
    }
    .fileUpload input.upload {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }
</style>

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
                <h3 class="box-title">Informações do Usuário</h3>
            </div>
            <!-- /.box-header -->
        
            <!-- form start -->
            @foreach ($user as $u)
                <form action="{{ route('admin.config.user.update', $u->id) }}" method="POST" enctype="multipart/form-data" role="form">
                    {{ csrf_field() }}
                    <div class="box-body">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-3" style="float:none;margin:0 auto;">
                                    <img id="blah" src="/storage/{{ $u->photo }}" class="img-circle" style="width: 100px;height: auto;" />
                                    <div class="fileUpload btn btn-primary">
                                        <span>Foto de Perfil</span>
                                        <input type="file" name="photo" value="{{ $u->photo }}" class="upload" onchange="readURL(this);" />
                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('photo'))
                                <span class="text-red">
                                    <strong>{{ $errors->first('photo') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" name="name" class="form-control" value="{{ $u->name }}" maxlength="100">
                            @if ($errors->has('name'))
                                <span class="text-red">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Login</label>
                            <input type="text" name="login" class="form-control" value="{{ $u->login }}" maxlength="100">
                            @if ($errors->has('login'))
                                <span class="text-red">
                                    <strong>{{ $errors->first('login') }}</strong>
                                </span>
                            @endif
                        </div>                        

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="{{ $u->email }}">
                            @if ($errors->has('email'))
                                <span class="text-red">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

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
                        <button type="submit" class="btn btn-primary pull-right">Salvar Alterações</button>
                    </div>
                </form>
            @endforeach
        </div>
        <!-- /.box -->
    </div>

</div>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@stop
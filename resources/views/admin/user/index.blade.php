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

<div class="row">
    <div class="col-md-6" style="float: none;margin: 0 auto;">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Informações do Usuário</h3>
            </div>
            <!-- /.box-header -->
        
            <!-- form start -->
                <form action="" method="POST" enctype="multipart/form-data" role="form">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-3">
                                    <img id="blah" src="/storage/images/perfil/default.jpg" class="img-circle" style="width: 100px;height: auto;" />
                                    <div class="fileUpload btn btn-primary">
                                        <span>Carregar Nova Logomarca</span>
                                        <input type="file" name="logo" value="" class="upload" onchange="readURL(this);" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" name="" class="form-control" value="" maxlength="100">
                        </div>

                        <div class="form-group">
                            <label>Login</label>
                            <input type="text" name="" class="form-control" value="" maxlength="100">
                        </div>                        

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="" class="form-control" value="">
                        </div>

                        <div class="form-group">
                            <label>Senha</label>
                            <input type="password" name="" class="form-control" value="">
                        </div>

                        <div class="form-group">
                            <label>Repita a Senha</label>
                            <input type="password" name="" class="form-control" value="">
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Salvar Alterações</button>
                    </div>
                </form>
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
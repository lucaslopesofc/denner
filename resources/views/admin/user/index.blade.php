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
                                <div class="col-xs-6">
                                    <img id="blah" src="" style="width: 200px;height: auto;border-radius: 4px;box-shadow: 0 1px 3px rgba(0,0,0,.15);" />
                                    <p class="help-block">Imagem deve ser no máximo 200 x 40 pixels.</p>
                                </div>
                                <div class="col-xs-6">
                                    <div class="fileUpload btn btn-primary">
                                        <span>Carregar Nova Logomarca</span>
                                        <input type="file" name="logo" value="" class="upload" onchange="readURL(this);" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Descrição do Site</label>
                            <textarea name="desc" class="form-control" rows="2" maxlength="150" value=""></textarea>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-10">
                                    <label>Rua</label>
                                    <input type="text" name="street" class="form-control" value="" maxlength="100">
                                </div>
                                <div class="col-xs-2">
                                    <label>Nº</label>
                                    <input type="number" name="number" class="form-control" value="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Bairro</label>
                            <input type="text" name="neighborhood" class="form-control" value="" maxlength="100">
                        </div>

                        <div class="form-group">
                            <label>Cidade</label>
                            <input type="text" name="city" class="form-control" value="" maxlength="100">
                        </div>                        

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="">
                        </div>

                        <div class="form-group">
                            <label>Facebook</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-facebook"></i>
                                </div>
                                <input type="text" name="facebook" class="form-control" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Instagram</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-instagram"></i>
                                </div>
                                <input type="text" name="instagram" class="form-control" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Telefone</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                            <input type="text" name="telephone" class="form-control" value="">
                                    </div>
                                </div>
                                
                                <div class="col-xs-6">
                                    <label>Celular</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-mobile-phone"></i>
                                        </div>
                                        <input type="text" name="cellphone" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
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
@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Painel Administrativo <small>Sliders</small></h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Slider</li>
        <li class="active">Novo</li>
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
                <h3 class="box-title">Adicionar Novo Slider</h3>
            </div>

            <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data" role="form">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">

                        <div class="form-group">
                            <div class="col-md-5">
                                <img id="blah" src="../../vendor/adminlte/img/default.jpg" style="width: 200px;height: auto;border-radius: 4px;box-shadow: 0 1px 3px rgba(0,0,0,.15);" />
                            </div>
                            <div class="col-md-7">
                                <div class="fileUpload btn btn-primary">
                                    <span>Selecione a Imagem do Slider</span>
                                    <input type="file" name="image" class="upload" onchange="readURL(this);" />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group" style="margin-top: 15px;">
                                <label>Link (Opcional)</label>
                                <input type="text" name="link" class="form-control" placeholder="Digite o link da imagem">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="1">Ativo</option>
                                    <option value="0">Inativo</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Enviar</button>
                </div>
            </form>
        </div>
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


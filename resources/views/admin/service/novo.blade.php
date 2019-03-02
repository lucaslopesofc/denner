@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Painel Administrativo <small>Serviços</small></h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="/admin/servicos"> Serviços</a></li>
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

    <div class="col-md-7">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Adicionar Novo Serviço</h3>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <form action="{{ route('admin.service.store') }}" method="POST" enctype="multipart/form-data" role="form">
                {{ csrf_field() }}
                <div class="box-body">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-3" style="float:none;margin:0 auto;">
                                <img id="blah" src="/storage/images/services/default.jpg" class="media-object" style="width: 150px;height: auto;border-radius: 4px;box-shadow: 0 1px 3px rgba(0,0,0,.15);" />
                                <div class="fileUpload btn btn-primary">
                                    <span>Imagem do Serviço</span>
                                    <input type="file" name="image" value="" class="upload" onchange="readURL(this);" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12" style="text-align:center;">
                                @if ($errors->has('image'))
                                    <span class="text-red">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Título do Serviço <b class="text-red">*</b></label>
                        <input type="text" name="title" class="form-control" maxlength="50" required>
                        @if ($errors->has('title'))
                            <span class="text-red">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Descrição do Serviço <b class="text-red">*</b></label>
                        <textarea name="text" class="form-control" rows="6" required></textarea>
                        @if ($errors->has('text'))
                            <span class="text-red">
                                <strong>{{ $errors->first('text') }}</strong>
                            </span>
                        @endif
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Enviar</button>
                    <a href="{{ route('admin.service') }}" class="btn btn-danger">Cancelar</a>
                </div>
                <!-- /.box-footer -->
                
            </form>
            <!-- form end -->

        </div>
        <!-- /.box -->
    </div>

    <div class="col-md-5">
        <div class="box box-danger">

            <div class="box-header with-border">
                <h3 class="box-title">Informações</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
                <ul>
                    <li>Para melhor visualização no site, a imagem deve ter tamanho de 1200 x 800;</li>
                    <li>Imagens apenas nos formatos JPEG/PNG/JPG.</li>
                </ul>
            </div>
            <!-- /.box-body -->

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
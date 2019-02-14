@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Painel Administrativo <small>Serviços</small></h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="/admin/servicos"> Serviços</a></li>
        <li class="active">Editar</li>
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
                <h3 class="box-title">Adicionar Novo Serviço</h3>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <form action="{{ route('admin.service.update', $service->id) }}" method="POST" enctype="multipart/form-data" role="form">
                {{ csrf_field() }}
                <div class="box-body">

                    <div class="form-group" style="text-align:center;">
                        <div class="row">
                            <div class="col-xs-3" style="float:none;margin:0 auto;">
                                <img id="blah" src="/storage/{{ $service->image }}" class="media-object" style="width: 150px;height: auto;border-radius: 4px;box-shadow: 0 1px 3px rgba(0,0,0,.15);" />
                                <div class="fileUpload btn btn-primary">
                                    <span>Imagem do Serviço</span>
                                    <input type="file" name="image" value="{{ $service->image }}" class="upload" onchange="readURL(this);" />
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('image'))
                            <span class="text-red">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Título do Serviço</label>
                        <input type="text" name="title" class="form-control" value="{{ $service->title }}" required>
                        @if ($errors->has('title'))
                            <span class="text-red">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Descrição do Serviço</label>
                        <textarea name="text" class="form-control" rows="6" value="{{ $service->text }}">{{ $service->text }}</textarea>
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
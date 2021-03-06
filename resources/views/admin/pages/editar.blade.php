@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Painel Administrativo <small>Páginas</small></h1>
    <ol class="breadcrumb">
        <li class="active"><a href="/admin"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><a>Configurações</a></li>
        <li class="active"><a href="/admin/configuracoes/paginas">Páginas</a></li>
        <li class="active"><a>Editar</a></li>
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
                <h3 class="box-title">Editar Página</h3>
            </div>
            <!-- /.box-header -->

            <form action="{{ route('admin.config.pages.update', $pages->id) }}" method="POST" enctype="multipart/form-data" role="form">
                {{ csrf_field() }}
                <div class="box-body">
                    <input type="hidden" name="tags" value="{{ $pages->tags }}">
                    
                    <div class="form-group">
                        <label>Título <b class="text-red">*</b></label>
                        <input type="text" name="title" class="form-control" value="{{ $pages->title }}" maxlength="60" required>
                        @if ($errors->has('title'))
                            <span class="text-red">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Subtítulo</label>
                        <input type="text" name="subtitle" class="form-control" value="{{ $pages->subtitle }}" maxlength="60">
                        @if ($errors->has('subtitle'))
                            <span class="text-red">
                                <strong>{{ $errors->first('subtitle') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Descrição <b class="text-red">*</b></label>
                        <textarea name="text" class="form-control" rows="5" value="{{ $pages->text }}" maxlength="600">{{ $pages->text }}</textarea>
                        @if ($errors->has('text'))
                            <span class="text-red">
                                <strong>{{ $errors->first('text') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="col-md-5">
                            <img id="blah" src="/storage/{{ $pages->image }}" style="width: 200px;height: auto;border-radius: 4px;box-shadow: 0 1px 3px rgba(0,0,0,.15);" />
                        </div>
                        <div class="col-md-7">
                            <div class="fileUpload btn btn-primary">
                                <span>Selecione a Imagem</span>
                                <input type="file" name="image" value="{{ $pages->image }}" class="upload" onchange="readURL(this);" />
                            </div>
                            <p></p>
                            <p class="help-block">A imagem não deve ser maior que 2MB.</p>
                            <p class="help-block">Envie apenas formatos de imagem PNG/JPG/JPEG.</p>
                            @if ($errors->has('image'))
                                <span class="text-red">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Enviar</button>
                    <a href="{{ route('admin.config.pages') }}" class="btn btn-danger">Cancelar</a>
                </div>
                <!-- /.box-footer -->

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
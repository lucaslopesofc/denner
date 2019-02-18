@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Painel Administrativo <small>Postagens</small></h1>
    <ol class="breadcrumb">
        <li class="active"><a href="/admin"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="/admin/blog/postagens"> Blog</a></li>
        <li><a href="/admin/blog/postagens"> Postagens</a></li>
        <li><a> Novo</a></li>
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

<div class="col-xs-10" style="float: none;margin: 0 auto;">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Nova Postagem</h3>
        </div>
        <!-- /.box-header -->

        <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <div class="row">
                    <div class="col-xs-3" style="float:none;margin:0 auto;margin-top:15px;">
                        <img id="blah" src="/storage/images/services/default.jpg" class="media-object" style="width: 250px;height: auto;border-radius: 4px;box-shadow: 0 1px 3px rgba(0,0,0,.15);">
                        <div class="fileUpload btn btn-primary">
                            <span>Carregar Imagem da Postagem</span>
                            <input type="file" name="image" class="upload" onchange="readURL(this);">
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group">
                    <label>Título da Postagem <b class="text-red">*</b></label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="row">
                    <div class="col-xs-6">
                        <label>Categoria <b class="text-red">*</b></label>
                        <select name="status" class="form-control">
                            <option>Selecione a categoria</option>
                            @foreach ($category as $cat)
                                <option>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-6">
                        <label>Status <b class="text-red">*</b></label>
                        <select class="form-control">
                            <option value="1">Ativo</option>
                            <option value="0">Inativo</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Texto</label>
                    <textarea name="text" class="textarea" placeholder="Redija seu texto aqui ..."
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Enviar</button>
                <a href="{{ URL::previous() }}" class="btn btn-danger">Cancelar</a>
            </div>

        </form>

    </div>
    <!-- /.box -->
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
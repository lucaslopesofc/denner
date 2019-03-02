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

<div class="row">

    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Cadastrar Nova Postagem</h3>
            </div>
            <!-- /.box-header -->

            <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-3" style="float:none;margin:0 auto;margin-top:15px;">
                            <img id="blah" src="/storage/images/blog/default.jpg" class="media-object" style="width: 250px;height: auto;border-radius: 4px;box-shadow: 0 1px 3px rgba(0,0,0,.15);">
                            <div class="fileUpload btn btn-primary">
                                <span>Carregar Nova Imagem da Postagem</span>
                                <input type="file" name="image" class="upload" onchange="readURL(this);">
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

                <div class="box-body">

                    <div class="form-group">
                        <label>Título da Postagem <b class="text-red">*</b></label>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control" maxlength="100" required>
                        @if ($errors->has('title'))
                            <span class="text-red">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <label>Categoria <b class="text-red">*</b></label>
                                <select name="category" class="form-control">
                                    <option>Selecione uma categoria</option>
                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category'))
                                    <span class="text-red">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-xs-6">
                                <label>Status <b class="text-red">*</b></label>
                                <select name="status" class="form-control">
                                    <option value="1">Ativo</option>
                                    <option value="0">Inativo</option>
                                </select>
                                @if ($errors->has('status'))
                                    <span class="text-red">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>URL <b class="text-red">*</b></label>
                        <input type="text" name="slug" value="{{ old('slug') }}" class="form-control" maxlength="191" required>
                        @if ($errors->has('slug'))
                            <span class="text-red">
                                <strong>{{ $errors->first('slug') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Texto <b class="text-red">*</b></label>
                        <textarea name="text" class="textarea"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('text') }}</textarea>
                        @if ($errors->has('text'))
                            <span class="text-red">
                                <strong>{{ $errors->first('text') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Enviar</button>
                    <a href="{{ route('admin.post') }}" class="btn btn-danger">Cancelar</a>
                </div>

            </form>

        </div>
        <!-- /.box -->
    </div>

    <div class="col-md-4">
        <div class="box box-danger">

            <div class="box-header with-border">
                <h3 class="box-title">Informações</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
                <ul>
                    <li>Para melhor visualização no site, a imagem deve ter tamanho de 795 x 530;</li>
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
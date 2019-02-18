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
<div class="col-xs-10" style="float: none;margin: 0 auto;">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Nova Postagem</h3>
        </div>
        <!-- /.box-header -->

        <form action="" method="POST">
            <div class="box-body">
                <div class="form-group">
                    <label>Título da Postagem <b class="text-red">*</b></label>
                    <input type="text" class="form-control">
                </div>

                <div class="row">
                    <div class="col-xs-6">
                        <label>Categoria <b class="text-red">*</b></label>
                        <select class="form-control">
                            <option>option 1</option>
                        </select>
                    </div>
                    <div class="col-xs-6">
                        <label>Status <b class="text-red">*</b></label>
                        <select class="form-control">
                            <option>option 1</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Texto</label>
                    <textarea class="textarea" placeholder="Redija seu texto aqui ..."
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Enviar</button>
                <a href="" class="btn btn-danger">Cancelar</a>
            </div>

        </form>

    </div>
    <!-- /.box -->
</div>
@stop
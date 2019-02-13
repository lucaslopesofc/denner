@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Painel Administrativo <small>Serviços</small></h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Serviços</li>
    </ol>
@stop

@section('content')
<div class="row">
    <div class="col-md-6" style="float: none;margin: 0 auto;">
            <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Serviços</h3>
                <div class="box-tools pull-right">
                    <a href="" class="btn btn-block btn-success btn-flat"><i class="fa fa-plus"></i> Adicionar Serviço</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>Imagem</th>
                        <th>Título</th>
                        <th></th>
                    </tr>
                    @foreach ($service as $s)
                    <tr>
                        <td><img src="/storage/{{ $s->image }}" alt="Now UI Kit" class="media-object" style="width: 100px;height: auto;border-radius: 4px;box-shadow: 0 1px 3px rgba(0,0,0,.15);"></td>
                        <td style="vertical-align:middle;">{{ $s->title }}</td>
                        <td style="width: 100px; text-align: right; vertical-align:middle;">
                            <a class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

</div>
@stop
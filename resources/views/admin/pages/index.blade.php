@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Painel Administrativo <small>Páginas</small></h1>
    <ol class="breadcrumb">
        <li class="active"><a href="/admin"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><a>Configurações</a></li>
        <li class="active"><a>Páginas</a></li>
    </ol>
@stop

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
        {!! $message !!}
    </div>
    <?php Session::forget('success');?>
@endif

<div class="col-md-6" style="float: none;margin: 0 auto;">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Páginas</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>Tag</th>
                    <th>Título</th>
                    <th></th>
                </tr>
                @foreach ($pages as $page)
                <tr>
                    <td style="vertical-align:middle;">{{ $page->id }}</td>
                    <td style="vertical-align:middle;">{{ $page->tags }}</td>
                    <td style="vertical-align:middle;">{{ $page->title }}</td>
                    <td style="width: 100px; text-align: right; vertical-align:middle;">
                        <a href="{{ route('admin.config.pages.edit', $page->id) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
@stop
@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Painel Administrativo <small>Dashboard</small></h1>
    <ol class="breadcrumb">
        <li class="active"><a><i class="fa fa-home"></i> Home</a></li>
    </ol>
@stop

@section('content')
<div class="row">

    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
            @if (!$stats == null)
                <h3>{{ $stats->patient }}</h3>
            @else
                <h3>0</h3>
            @endif
                <p><b>Pacientes</b></p>
            </div>
            <div class="icon">
                <i class="fa fa-user-md"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
            @if (!$stats == null)
                <h3>{{ $stats->diets }}</h3>
            @else
                <h3>0</h3>
            @endif
                <p><b>Dietas</b></p>
            </div>
            <div class="icon">
                <i class="fa fa-file-text"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
            @if (!$stats == null)
                <h3>{{ $stats->recipe }}</h3>
            @else
                <h3>0</h3>
            @endif
                <p><b>Receitas</b></p>
            </div>
            <div class="icon">
                <i class="ion ion-pizza"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
</div>

<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">

        <div class="box-header">
            <h3 class="box-title">Novos Depoimentos</h3>
        </div>

            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>Nome</th>
                        <th>Cidade</th>
                        <th>Status</th>
                    </tr>
                    @foreach ($testimonies as $t)
                        <tr>
                            <td style="vertical-align:middle;font-size: 15px;">{{ $t->name }}</td>
                            <td style="vertical-align:middle;font-size: 15px;">{{ $t->city }}</td>
                            <td style="vertical-align:middle;" ><span class="label label-warning">Pendente</span></td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.box-body -->

        </div>
        <!-- /.box -->
    </div>

    <div class="col-md-6">
        <div class="box box-primary">

            <div class="box-header">
                <h3 class="box-title">Últimos Comentários</h3>
            </div>

            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>Postagem</th>
                        <th>Nome</th>
                        <th>Comentário</th>
                    </tr>
                    @foreach ($comment as $c)
                        <tr>
                            <td style="vertical-align:middle;font-size: 15px;">{{ $c->title }}</td>
                            <td style="vertical-align:middle;font-size: 15px;">{{ $c->name }}</td>
                            <td style="vertical-align:middle;font-size: 15px;">{{ $c->comment }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.box-body -->

            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                </ul>
            </div>

        </div>
        <!-- /.box -->
    </div>
</div>
@stop
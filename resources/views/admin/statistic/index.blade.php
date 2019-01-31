@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Painel Administrativo</h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Estatísticas</li>
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
                <p>Pacientes</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
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
                <p>Dietas</p>
            </div>
            <div class="icon">
                <i class="ion ion-pizza"></i>
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
                <p>Receitas</p>
            </div>
            <div class="icon">
                <i class="ion ion-folder"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
</div>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Edite suas estatísticas</h3>
    </div>
    <div class="box-body">
        <form action="estatistica" method="POST">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-xs-4">
                    <label>Pacientes</label>
                    @if (!($stats == null))
                        <input type="number" name="patient" class="form-control" value="{{ $stats->patient }}">
                    @else
                        <input type="number" name="patient" class="form-control" value="0">
                    @endif

                    @if ($errors->has('patient'))
                        <span class="text-red">
                            <strong>{{ $errors->first('patient') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-xs-4">
                    <label>Dietas</label>
                    @if (!($stats == null))
                        <input type="number" name="diets" class="form-control" value="{{ $stats->diets }}">
                    @else
                        <input type="number" name="diets" class="form-control" value="0">
                    @endif

                    @if ($errors->has('diets'))
                        <span class="text-red">
                            <strong>{{ $errors->first('diets') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-xs-4">
                    <label>Receitas</label>
                    @if (!($stats == null))
                        <input type="number" name="recipe" class="form-control" value="{{ $stats->recipe }}">
                    @else
                        <input type="number" name="recipe" class="form-control" value="0">
                    @endif

                    @if ($errors->has('recipe'))
                        <span class="text-red">
                            <strong>{{ $errors->first('recipe') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Enviar</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
    <!-- /.box-body -->      
</div>
<!-- /.box -->
@stop
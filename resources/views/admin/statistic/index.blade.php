@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Painel Adminstrativo</h1>
@stop

@section('content')
<div class="row">
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
            @foreach ($stats as $stat)
                <h3>{{ $stat->patient }}</h3>
            @endforeach
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
            @foreach ($stats as $stat)
                <h3>{{ $stat->diets }}</h3>
            @endforeach
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
            @foreach ($stats as $stat)
                <h3>{{ $stat->recipe }}</h3>
            @endforeach
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
                    <input type="text" name="patient" class="form-control" placeholder="{{ $stat->patient }}">
                </div>
                <div class="col-xs-4">
                    <label>Dietas</label>
                    <input type="text" name="diets" class="form-control" placeholder="{{ $stat->diets }}">
                </div>
                <div class="col-xs-4">
                    <label>Receitas</label>
                    <input type="text" name="recipe" class="form-control" placeholder="{{ $stat->recipe }}">
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
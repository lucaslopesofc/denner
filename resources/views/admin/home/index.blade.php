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
@stop
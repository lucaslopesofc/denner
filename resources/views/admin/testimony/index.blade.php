@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Painel Administrativo</h1>
@stop

@section('content')
<div class="row">
    @foreach ($testimonies as $testimonie)
    <div class="col-md-3">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
                <div class="widget-user-image">
                    <img class="img-circle" src="/storage/{{ $testimonie->photo }}" alt="{{ $testimonie->name }}">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">{{ $testimonie->name }}</h3>
                <h5 class="widget-user-desc">{{ $testimonie->city }}</h5>
            </div>
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    <li><a>{{ $testimonie->comment }}</a></li>
                    <li>
                        <form action="depoimento/{{ $testimonie->id }}" method="post">
                        {!! csrf_field() !!}
                            <div class="pull-right box-tools" style="margin: 5px 5px 5px 5px;">
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                <input type="hidden" name="_method" value="delete">
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.widget-user -->
    </div>
    <!-- /.col -->
    @endforeach
</div>

<ul class="pagination">
    {{ $testimonies->links() }}
</ul>

@stop
@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Painel Administrativo <small>Sliders</small></h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Slider</li>
        <li class="active">Editar</li>
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

    <div class="col-md-6" style="float: none;margin: 0 auto;">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Slider</h3>
            </div>

            <form action="{{ route('admin.slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data" role="form">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <div class="form-group">
                            @if ($errors->has('image'))
                                <span class="text-red">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                            <div class="col-md-5">
                                <img id="blah" src="/storage/{{ $slider->image }}" style="width: 200px;height: auto;border-radius: 4px;box-shadow: 0 1px 3px rgba(0,0,0,.15);" />
                            </div>
                            <div class="col-md-7">
                                <div class="fileUpload btn btn-primary">
                                    <span>Selecione a Imagem do Slider</span>
                                    <input type="file" name="image" value="{{ old('image') }}" class="upload" onchange="readURL(this);" />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group" style="margin-top: 15px;">
                                <label>Link (Opcional)</label>
                                <input type="text" name="link" value="{{ $slider->link }}" class="form-control" placeholder="www.nomedosite.com.br">
                                @if ($errors->has('link'))
                                    <span class="text-red">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    @if($slider->status == 0)
                                        <option value="" selected disabled hidden>Inativo</option>
                                    @else
                                        <option value="" selected disabled hidden>Ativo</option>
                                    @endif
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
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Enviar</button>
                </div>
            </form>
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
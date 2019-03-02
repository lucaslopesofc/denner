@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Painel Administrativo <small>Informações</small></h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><a> Configurações</a></li>
        <li class="active"><a> Informações</a></li>
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

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
        {!! $message !!}
    </div>
    <?php Session::forget('success');?>
@endif

<div class="row">

    <div class="col-md-7">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Informações do Site</h3>
            </div>
            <!-- /.box-header -->
        
            <!-- form start -->
            @foreach ($infos as $info)
                <form action="{{ route('admin.config.info.update', $info->id) }}" method="POST" enctype="multipart/form-data" role="form">
                    {{ csrf_field() }}
                    <div class="box-body">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-4" style="float:none;margin:0 auto;">
                                    <img id="blah" src="/storage/{{ $info->logo }}" style="width: 200px;height: auto;border-radius: 4px;box-shadow: 0 1px 3px rgba(0,0,0,.15);" />
                                    <div class="fileUpload btn btn-primary">
                                        <span>Carregar Nova Logomarca</span>
                                        <input type="file" name="logo" value="{{ $info->logo }}" class="upload" onchange="readURL(this);" />
                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('photo'))
                                <span class="text-red">
                                    <strong>{{ $errors->first('photo') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Descrição do Site</label>
                            <textarea name="desc" class="form-control" rows="2" maxlength="150" value="{{ $info->desc }}">{{ $info->desc }}</textarea>
                            @if ($errors->has('desc'))
                                <span class="text-red">
                                    <strong>{{ $errors->first('desc') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-10">
                                    <label>Rua</label>
                                    <input type="text" name="street" class="form-control" value="{{ $info->street }}" maxlength="100">
                                </div>
                                <div class="col-xs-2">
                                    <label>Nº</label>
                                    <input type="number" name="number" class="form-control" value="{{ $info->number }}">
                                </div>
                            </div>
                            @if ($errors->has('street'))
                                <span class="text-red">
                                    <strong>{{ $errors->first('street') }}</strong>
                                </span>
                            @endif
                            <p>
                                @if ($errors->has('number'))
                                    <span class="text-red">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                            </p>
                        </div>

                        <div class="form-group">
                            <label>Bairro</label>
                            <input type="text" name="neighborhood" class="form-control" value="{{ $info->neighborhood }}" maxlength="100">
                            @if ($errors->has('neighborhood'))
                                <span class="text-red">
                                    <strong>{{ $errors->first('neighborhood') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Cidade</label>
                            <input type="text" name="city" class="form-control" value="{{ $info->city }}" maxlength="100">
                            @if ($errors->has('city'))
                                <span class="text-red">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif
                        </div>                        

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="{{ $info->email }}">
                            @if ($errors->has('email'))
                                <span class="text-red">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Facebook</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-facebook"></i>
                                </div>
                                <input type="text" name="facebook" class="form-control" value="{{ $info->facebook }}">
                            </div>
                            @if ($errors->has('facebook'))
                                <span class="text-red">
                                    <strong>{{ $errors->first('facebook') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Instagram</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-instagram"></i>
                                </div>
                                <input type="text" name="instagram" class="form-control" value="{{ $info->instagram }}">
                            </div>
                        </div>
                        @if ($errors->has('instagram'))
                            <span class="text-red">
                                <strong>{{ $errors->first('instagram') }}</strong>
                            </span>
                        @endif

                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Telefone</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                            <input type="text" name="telephone" class="form-control" value="{{ $info->telephone }}" maxlength="14">
                                    </div>
                                    @if ($errors->has('telephone'))
                                        <span class="text-red">
                                            <strong>{{ $errors->first('telephone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="col-xs-6">
                                    <label>Celular</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-mobile-phone"></i>
                                        </div>
                                        <input type="text" name="cellphone" class="form-control" value="{{ $info->cellphone }}" maxlength="16">
                                    </div>
                                    @if ($errors->has('cellphone'))
                                        <span class="text-red">
                                            <strong>{{ $errors->first('cellphone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Salvar Alterações</button>
                    </div>
                </form>
            @endforeach
        </div>
        <!-- /.box -->
    </div>

    <div class="col-md-5">
        <div class="box box-danger">

            <div class="box-header with-border">
                <h3 class="box-title">Informações</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
                <ul>
                    <li>A logomarca deve ter tamanho 200 x 40;</li>
                    <li>Imagens apenas nos formatos JPEG/PNG/JPG;</li>
                    <li>Tamanho máximo da imagem 2MB.</li>
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
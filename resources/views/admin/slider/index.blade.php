@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Painel Administrativo <small>Sliders</small></h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Slider</li>
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
            <h3 class="box-title">Sliders</h3>
            <div class="box-tools pull-right">
                <a href="{{ route('admin.slider.create') }}" class="btn btn-block btn-success btn-flat"><i class="fa fa-plus"></i> Adicionar Slider</a>
            </div>
        </div>
        <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tr>
                <th>Status</th>
                <th>Imagem</th>
                <th>Link</th>
                <th></th>
            </tr>
            @foreach ($slider as $sli)
            <tr>
                @if ($sli->status == '0')
                    <td style="vertical-align:middle;"><span class="label label-danger">Inativo</span></td>
                @else
                    <td style="vertical-align:middle;"><span class="label label-success">Ativo</span></td>
                @endif
                <td><img src="/storage/{{ $sli->image }}" class="media-object" style="width: 200px;height: auto;border-radius: 4px;box-shadow: 0 1px 3px rgba(0,0,0,.15);"></td>
                <td style="vertical-align:middle;"><a href="{{ $sli->link }}" target="_blank">{{ $sli->link }}</a></td>
                <td style="text-align: right; vertical-align:middle;">
                    <a href="{{ route('admin.slider.edit', $sli->id) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                    <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$sli->id}})" 
                        data-target="#DeleteModal" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <!-- /.box-body -->
        <div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
                {{ $slider->links() }}
            </ul>
        </div>
    </div>
    <!-- /.box -->
</div>

<!-- Delete Modal -->
<div id="DeleteModal" class="modal fade in" role="dialog">
   <div class="modal-dialog ">
     <!-- Modal content-->
     <form action="" id="deleteForm" method="post">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title text-center">Confirmar Exclusão</h4>
             </div>
             <div class="modal-body">
                 {{ csrf_field() }}
                 {{ method_field('DELETE') }}
                 <p class="text-center">Você tem certeza que deseja deletar este slider?</p>
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Sim, Deletar</button>
             </div>
         </div>
     </form>
   </div>
</div>
<!-- Delete Modal -->

<!-- Script -->
<script type="text/javascript">
    function deleteData(id)
    {
        var id = id;
        var url = '{{ route("admin.slider.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm").attr('action', url);
    }

    function formSubmit()
    {
        $("#deleteForm").submit();
    }
</script>
<!-- Script -->
@stop
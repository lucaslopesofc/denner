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
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
        {!! $message !!}
    </div>
    <?php Session::forget('success');?>
@endif

<div class="row">
    <div class="col-md-6" style="float: none;margin: 0 auto;">
            <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Serviços</h3>
                <div class="box-tools pull-right">
                    <a href="{{ route('admin.service.create') }}" class="btn btn-block btn-success btn-flat"><i class="fa fa-plus"></i> Adicionar Serviço</a>
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
                            <a href="{{ route('admin.service.edit', $s->id) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$s->id}})" 
                                data-target="#DeleteModal" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    {{ $service->links() }}
                </ul>
            </div>
        </div>
        <!-- /.box -->
    </div>

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
                 <p class="text-center">Você tem certeza que deseja deletar este serviço?</p>
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
        var url = '{{ route("admin.service.destroy", ":id") }}';
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
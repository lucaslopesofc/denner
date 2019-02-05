@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Painel Administrativo <small>Depoimentos</small></h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Depoimentos</li>
        <li class="active">Pendentes</li>
    </ol>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
            {!! $message !!}
        </div>
        <?php Session::forget('success');?>
        @endif

        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Cidade</th>
                        <th>Comentário</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    @foreach ($testimonies as $testimonie)
                        <tr>
                            <td style="width: 50px; vertical-align:middle;font-size: 15px;">{{ $testimonie->id }}</td>
                            <td style="width: 200px; vertical-align:middle;font-size: 15px;">{{ $testimonie->name }}</td>
                            <td style="width: 200px; vertical-align:middle;font-size: 15px;">{{ $testimonie->city }}</td>
                            <td style="vertical-align:middle;font-size: 15px;">{{ $testimonie->comment }}</td>
                            <td style="vertical-align:middle;" ><span class="label label-warning">Pendente</span></td>
                            <td style="width: 100px; text-align: right; vertical-align:middle;">
                                <a href="javascript:;" data-toggle="modal" onclick="editData({{$testimonie->id}})" 
                                    data-target="#EditModal" class="btn btn-success btn-flat"><i class="fa fa-check"></i></a>

                                <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$testimonie->id}})" 
                                    data-target="#DeleteModal" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.box-body -->

            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    {{ $testimonies->links() }}
                </ul>
            </div>

        </div>
        <!-- /.box -->
    </div>

</div>

<!-- Edit Modal -->
<div id="EditModal" class="modal fade in" role="dialog">
   <div class="modal-dialog ">
     <!-- Modal content-->
     <form action="" id="editForm" method="post">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title text-center">Aceitar Depoimento</h4>
             </div>
             <div class="modal-body">
                 {{ csrf_field() }}
                 {{ method_field('POST') }}
                 <p class="text-center">Você tem certeza que deseja aceitar este depoimento?</p>
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                <button type="submit" name="" class="btn btn-success" data-dismiss="modal" onclick="formSubmitEdit()">Sim, Aceitar</button>
             </div>
         </div>
     </form>
   </div>
</div>
<!-- Edit Modal -->

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
                 <p class="text-center">Você tem certeza que deseja deletar este depoimento?</p>
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Sim, Deletar</button>
             </div>
         </div>
     </form>
   </div>
</div>
<!-- Delete Modal -->

<!-- Script -->
<script type="text/javascript">
    function editData(id)
    {
        var id = id;
        var url = '{{ route("admin.testimony.pending.update", ":id") }}';
        url = url.replace(':id', id);
        $("#editForm").attr('action', url);
    }

    function formSubmitEdit()
    {
        $("#editForm").submit();
    }
</script>
<!-- Script -->

<!-- Script -->
<script type="text/javascript">
    function deleteData(id)
    {
        var id = id;
        var url = '{{ route("admin.testimony.pending.destroy", ":id") }}';
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

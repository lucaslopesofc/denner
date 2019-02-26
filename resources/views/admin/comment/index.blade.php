@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Painel Administrativo <small>Comentários</small></h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><a href="/admin/blog/postagens"> Blog</a></li>
        <li class="active"><a> Comentários</a></li>
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

            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Postagem</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Comentário</th>
                        <th></th>
                    </tr>
                    @foreach ($comment as $c)
                        <tr>
                            <td style="vertical-align:middle;font-size: 15px;">{!! $c->id !!}</td>
                            <td style="vertical-align:middle;font-size: 15px;">{!! $c->title !!}</td>
                            <td style="vertical-align:middle;font-size: 15px;">{!! $c->name !!}</td>
                            <td style="vertical-align:middle;font-size: 15px;">{!! $c->email !!}</td>
                            <td style="width:500px;vertical-align:middle;font-size: 15px;">{!! $c->comment !!}</td>
                            <td style="width: 100px; text-align: right; vertical-align:middle;">
                                <a href="javascript:;" data-toggle="modal" onclick="deleteData({{ $c->id }})" 
                                    data-target="#DeleteModal" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.box-body -->

            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    {!! $comment->links() !!}
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
                 <p class="text-center">Você tem certeza que deseja deletar este comentário?</p>
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
        var url = '{{ route("admin.comment.destroy", ":id") }}';
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
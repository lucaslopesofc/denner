@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Painel Administrativo <small>Postagens</small></h1>
    <ol class="breadcrumb">
        <li class="active"><a href="/admin"><i class="fa fa-home"></i> Home</a></li>
        <li><a> Blog</a></li>
        <li><a> Postagens</a></li>
    </ol>
@stop

@section('content')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Postagens</h3>

        <div class="box-tools pull-right">
        <a href="{{ route('admin.post.create') }}" type="button" class="btn btn-block btn-success btn-flat"><i class="fa fa-plus"></i> Nova Postagem</a>
        </div>

    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
        <tr>
            <th>Thumbnail</th>
            <th>Título</th>
            <th>Categoria</th>
            <th>Status</th>
            <th></th>
        </tr>
        @foreach ($blog as $b)
        <tr>
            <td><img src="/storage/{{ $b->image }}" class="media-object" style="width: 150px;height: auto;border-radius: 4px;box-shadow: 0 1px 3px rgba(0,0,0,.15);"></td>
            <td style="vertical-align:middle;">{{ $b->title }}</td>
            <td style="vertical-align:middle;">{{ $b->name }}</td>
            @if ($b->status == '1')
                <td style="vertical-align:middle;"><span class="label label-success">Ativo</span></td>
            @else
                <td style="vertical-align:middle;"><span class="label label-danger">Inativo</span></td>
            @endif
            <td style="text-align: right; vertical-align:middle;">
                <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></button>
                <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$b->id}})" 
                    data-target="#DeleteModal" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
        </table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
            {{ $blog->links() }}
        </ul>
    </div>
</div>
<!-- /.box -->

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
                 <p class="text-center">Você tem certeza que deseja deletar esta postagem?</p>
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
        var url = '{{ route("admin.post.destroy", ":id") }}';
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
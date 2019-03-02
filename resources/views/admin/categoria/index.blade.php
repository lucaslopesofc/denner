@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Painel Administrativo <small>Categorias</small></h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><a href="/admin/blog/postagens"> Blog</a></li>
        <li class="active"><a> Categorias</a></li>
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
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Categorias</h3>
            </div>
            <!-- /.box-header -->
        
            <!-- form start -->
            <form role="form">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Nome da Categoria</th>
                            <th></th>
                        </tr>
                        @foreach ($category as $cat)
                        <tr>
                            <td style="width: 50px; vertical-align:middle;font-size: 15px;">{{ $cat->id }}</td>
                            <td style="vertical-align:middle;">{{ $cat->name }}</td>
                            <td style="width: 100px; text-align: right; vertical-align:middle;">
                                <a href="{{ route('admin.category.edit', $cat->id) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$cat->id}})" 
                                    data-target="#DeleteModal" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>

            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    {{ $category->links() }}
                </ul>
            </div>

            </div>
            <!-- /.box -->
        </div>

        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Cadastrar Nova Categoria</h3>
                </div>
                <!-- /.box-header -->
            
            <!-- form start -->
            <form action="{{ route('admin.category.store') }}" method="POST" role="form">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label>Nome da Categoria</label>
                        <input type="text" name="name" class="form-control" maxlength="15" required>
                        @if ($errors->has('name'))
                            <span class="text-red">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Enviar</button>
                </div>
            </form>

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
                 <p class="text-center">Você tem certeza que deseja deletar esta categoria?</p>
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
        var url = '{{ route("admin.category.destroy", ":id") }}';
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
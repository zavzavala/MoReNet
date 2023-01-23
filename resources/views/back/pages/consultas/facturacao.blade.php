@extends('back.layouts.tables-layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Empresa')
@section('content')
<br><br><br>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    
                        <h2>Consultar Empresas facturadas</h2>
                        <h5>Aqui você poderá consultar Empresas facturadas. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Empresas Facturadas <span> <a style="color:white;" href="<?= route('autor.facturacao.relatorio')  ?>" target="_blank"><i title="Emitir Relatorio" style="font-size: 22px;float: right; padding:0px 10px" class="fa fa-print"></i></a></span> <span> <a style="color:white;" href="<?= route('autor.facturar')?>"><i title="Facturar" style="font-size: 22px;float: right;" class="fa fa-plus-circle"></i></a></span>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-facturacao">
                                        <thead>
                                            <tr>
                                                
                                                <th>Codigo</th>
                                                <th>Empresa</th>
                                                <th>Largura Banda</th>
                                                <th>Aumento Banda</th>
                                                <th>Valor Facturado</th>
                                                <th>Ação</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($facturacao as $items)
                                                <tr class="odd gradeX">
                                                    <td>{{$items->id}}</td>
                                                   
                                                    <td>{{$items->empresa_id}}</td>
                                                    <td>{{$items->largura_banda}}</td>
                                                    <td>{{$items->aumento_banda}}</td>
                                                    <td>{{$items->valor_facturado}} MZN</td>

                                                    <td style="padding: 1px 1px 1px 1px;">
                                                        <a href="<?= route('autor.facturacao.edit', ['id'=>$items->id])?>"><i title="Alterar Registro" style=" color:#c09046; font-size:14px;margin-left:2px; margin-right:2px" class="fa fa-pencil"></i></a>
                                                        <a href="#" id="deletefactura" data-id="{{$items->id}}"><i title="Excluir registro" style=" color:red; font-size:14px; margin-left:1px" class="fa fa-trash"></i></a>
                                                        <a style="color:blue;" href="<?= route('autor.facturacao.relIndividual', ['id'=>$items->id])  ?>" target="_blank"><i title="Emitir Relatorio" style="font-size: 22px;float: right; padding:0px 10px" class="fa fa-print"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#detalhes"><i title="Detalhes do registro" style=" color:blue; font-size:14px; margin-left:2px" class="fa fa-chevron-down"></i></a>
                                                        <div class="modal fade" id="detalhes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                        <h4 class="modal-title" id="myModalLabel">Detalhes do Registro</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Categoria</th>
                                                                                        <th>SubCategoria</th>
                                                                                        <th>Fornecedor</th>
                                                                                        <th>Descrição</th>
                                                                                        
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr class="odd gradeX">
                                                                                        <td</td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Voltar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                                @empty
                                                <stronge>Vazio</stronge>
                                            @endforelse
                                           <!-- forelseaqui -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
   
@endsection
@push('scripts')


<script type="text/javascript">

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    
    /* $(document).on('click', '#deletefactura', function(e){
        e.preventDefault();
        var cod = $(this).data('id');

        alert(cod);
    }); */
    $(document).ready(function() {

        $(document).on('click','#deletefactura', function(e){
            e.preventDefault();
            var factura_id = $(this).data('id');
            var url = '<?= route("autor.facturacao.destroy") ?>';

            swal.fire({
                title:'Atencao!',
                html:'Deseja <b>eliminar</b> este registro?',
                showCancelButton:true,
                showCloseButton:true,
                cancelButtonText:'Cancelar',
                confirmButtonText:'Sim, eliminar',
                cancelButtonColor:'#d33',
                confirmButtonColor:'#556ee6',
                width:400,
                allowOutsideClick:false
            }).then(function(result){
                    if(result.value){
                        $.post(url,{factura_id:factura_id}, function(data){
                            if(data.code == 1){
                               // $('#dataTables-facturacao').DataTable().ajax.reload(null, false);
                                toastr.success(data.msg);
                            }else{
                                toastr.error(data.msg);
                            }
                        }, 'json');
                    }
            });

        });

        $('#dataTables-facturacao').DataTable({
           
        
        });

         
    });


   
</script>
@endpush

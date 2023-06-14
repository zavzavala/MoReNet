@extends('back.layouts.tables-layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Empresa')
@section('content')
<br><br><br>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    
                        <h2>Consultar Empresas Registadas</h2>
                      
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Empresas Registadas <span> <a style="color:white;" href="<?= route('autor.empresa.relatorio_cliente')?>" target="_blank"><i title="Emitir Relatorio" style="font-size: 22px;float: right; padding:0px 10px" class="fa fa-print"></i></a>
                                </span> <span> <a style="color:white;" href="<?= route('autor.empresa.create')  ?>"><i title="Adicionar Empresa" style="font-size: 22px;float: right;" class="fa fa-plus-circle"></i></a></span>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-cliente">
                                        <thead>
                                            <tr>
                                                
                                                <th>Codigo</th>
                                                <th>Empresa</th>
                                                <th>Telefone</th>
                                                <th>E-mail</th>
                                                <th>Data Contrato</th>
                                                <th>Ação</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($data as $items)
                                                <tr class="odd gradeX">
                                                    
                                                    <td>
                                                    <a data-bs-toggle="modal" id="detalhes" data-bs-target = "#detalhes{{$items['id']}}">
                                                    <i title="Detalhes do registro" style=" color:blue; font-size:14px; margin-left:2px" class="fa fa-chevron-down"></i></a>
                                                              
                                                    {{$items->id}}</td>
                                                    <td>{{$items->empresa}}</td>
                                                    <td>{{$items->telefone}}</td>
                                                    <td>{{$items->email}}</td>
                                                    <td>{{$items->data_contrato}}</td>

                                                    <td style="padding: 1px 1px 1px 1px;">
                                                        <a href="<?= route('autor.empresa.edit', ['id'=>$items->id])?>"><i title="Alterar Registro" style=" color:#c09046; font-size:14px;margin-left:2px; margin-right:2px" class="fa fa-pencil"></i></a>
                                                        <a href="#" id="excluiClente" data-id="{{$items->id}}"><i title="Excluir registro" style=" color:red; font-size:14px; margin-left:1px" class="fa fa-trash"></i></a>
                                                        <a style="color:blue;" href="<?= route('autor.empresa.relatorioIndividual', ['id'=>$items->id])  ?>" target="_blank"><i title="Emitir Relatorio" style="font-size: 22px;float: right; padding:0px 10px" class="fa fa-print"></i></a>
                                                        <!-- Detalhes do Registo -->
                                                                    
                                                        <div class="modal fade" id="detalhes{{$items['id']}}" role="dialog">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Detalhes de : {{$items['id']}}<br>Registro Numero : {{$items['id']}}</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-striped table-bordered table-hover" style="width:100%">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Sigla</th>
                                                                                        <th>A investigação</th>
                                                                                        <th>Endereço Físico</th>
                                                                                        <th>Email</th>
                                                                                        
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr class="odd gradeX">
                                                                                       

                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Fechar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- Fim Modal Detalhes -->
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

        $(document).on('click','#excluiClente', function(e){
            e.preventDefault();
            var cliente_id = $(this).data('id');
            //alert(cliente_id); Retornar o id

            var url = '<?= route("autor.empresa.destroy") ?>';

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
                        $.post(url,{cliente_id:cliente_id}, function(data){
                            if(data.code == 1){
                                //$('#dataTables-cliente').DataTable().ajax.reload(null, false);
                                toastr.success(data.msg);
                            }else{
                                toastr.error(data.msg);
                            }
                        }, 'json');
                    }
            });

        });

        $('#dataTables-cliente').DataTable({
           
        });

    });
   
</script>
@endpush

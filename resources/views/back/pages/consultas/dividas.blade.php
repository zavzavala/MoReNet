@extends('back.layouts.tables-layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Empresa Com dividas')
@section('content')
<br><br><br>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    
                        <h1>Consultar Empresas Com dividas</h1>
                   <br>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">

                            @if(isset($data))
                            <div class="panel-heading">
                               Empresas Com dividas <!-- <span> <a style="color:white;" href="<?= route('autor.facturacao.relatorio')  ?>" target="_blank"><i title="Emitir Relatorio" style="font-size: 22px;float: right; padding:0px 10px" class="fa fa-print"></i></a></span> --> <span> <a style="color:white;" href="<?= route('autor.geralByEmpresa')?>"><i title="Visualizar Total de dívidas por empresa" style="font-size: 22px;float: right;" class="fa fa-eye"></i></a></span>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-facturacao">
                                        <thead>
                                            <tr>
                                                
                                                <th>Comprovativo</th>
                                                <th>Empresa</th>
                                                <th>L.Banda Contratada</th>
                                                <th>Aumento L.Banda</th>
                                                <th>Diminuição L.Banda</th>
                                                <th>Crédito</th>
                                                <th>Débito</th>
                                                <th>Valor Facturado</th>
                                                <th>Valor Pago</th>
                                                <th>Dívida</th>
                                                <th>Data da Factura</th>
                                                

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($data as $items)
                                                <tr class="odd gradeX">
                                                    <td>{{$items->comprovativo}}</td>
                                                   
                                                    <td>{{$items->empresa}}</td>
                                                    <td>{{$items->banda_contratada}} GB</td>
                                                    <td>{{$items->banda_aumento}} GB</td>
                                                    <td>{{$items->diminuicao_banda}} GB</td>
                                                    <td>{{$items->credito}} MZN</td>
                                                    <td>{{$items->debito}} MZN</td>
                                                    <td>{{$items->valor_facturado}} MZN</td>
                                                    <td>{{$items->valor_pago}} MZN</td>
                                                    <td>{{$items->divida}} MZN</td>
                                                    <td>{{$items->data}} </td>
                                                    

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

                        @else
                                
                            <div class="panel-heading">
                                Empresas Com dividas <!-- <span> <a style="color:white;" href="<?= route('autor.facturacao.relatorio')  ?>" target="_blank"><i title="Emitir Relatorio" style="font-size: 22px;float: right; padding:0px 10px" class="fa fa-print"></i></a></span>  --><span> <a style="color:white;" href="<?= route('autor.geral')?>"><i title="Visualizar todas empresas" style="font-size: 22px;float: right;" class="fa fa-eye"></i></a></span>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-facturacao">
                                            <thead>
                                                <tr>
                                                    <th>Empresa</th>
                                                    
                                                    <th>Total Dívida</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($SomaDividas as $items)
                                                    <tr class="odd gradeX">
                                                        <td>{{$items->empresa}}</td>
                                                        
                                                        <td>{{$items->divida}} MZN</td>
                                                      
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

                        @endif
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
    

    $('#dataTables-facturacao').DataTable({
        
    
    });

</script>
@endpush

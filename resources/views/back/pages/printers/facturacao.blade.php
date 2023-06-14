@extends('back.layouts.tables-layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Relatório')
@section('content')


 
    <main id="main" class="main">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title mt-2 d-print-none">
            
                <div class="col-md-6 col-xl-6 text-md-right">
                    <div class="mt-4 mt-md-0">
                        <div class="btn-group mb-3 mb-sm-0">
                            <button type="button" class="btn btn-primary" onclick="history.back()"><i data-feather="arrow-left-circle" class="mr-2"></i>Voltar</button>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" style="padding-left: 100px;padding-right: 100px;">

                            <div class="clearfix">
                                <!-- Logo & title -->
                                <center>
                                    <div class="clearfix mt-3"></div>
                                    <img src=" {{ asset('./back/static/logo.png') }}" style="width: 8%;position:relative;" alt="">

                                
                                    <div class="">
                                        <img src="./back/static/logo.pngs" alt="" />
                                        <h4 class="m-0 d-inline align-middle">República de Moçambique </h4>
                                        <address class="pl-2 mt-2">
                                        <br>
                                        
                                        </address>
                                    </div>
                                
                                </center>
                                <hr class=" mb-3">
                            </div>
                            @if($total_valor_facturado > 0)
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table mt-4 table-centered" class="display nowrap">
                                                <thead>
                                                    <center><strong>
                                                        <h4 class="text-muted">Relatório da Facturação</h4>
                                                    </strong></center>
                                                    
                                                    <tr>
                                                        <th>Empresa</th>
                                                        <!-- <th>comprovativo</th> -->
                                                        <th>banda contratada</th>
                                                        <th>banda facturada</th>
                                                        <th>aumento</th>
                                                        <th>total diminuicao</th>
                                                        <th>Valor Facturado</th>

                                                        <th>debito</th>
                                                        <th>credito</th>
                                                        <th>divida</th>
                                                    </tr>
                                                
                                                </thead>
                                                <tbody>
                                                    @foreach($data as $items)
                                                        <tr>
                                                        
                                                            <td>{{$items->empresa}}</td>
                                                           <!--  <td>{{$items->comprovativo}}</td> -->
                                                            <td>{{$items->total_contratada}}</td>
                                                            <td>{{$items->banda_facturada}}</td>
                                                            <td>{{$items->aumento}}</td>
                                                            <td>{{$items->total_diminuicao}}</td>
                                                            <td>{{$items->valor_facturado}}</td>
                                                            <td>{{$items->debito}}</td>
                                                            <td>{{$items->credito}}</td>
                                                            <td>{{$items->divida}}</td>
                                                        
                                                        </tr>
                                                        
                                                    @endforeach
                                                    <tr>
                                                        <th>Total</th>
                                                        <td></td><td></td>
                                                        <td></td><td></td>
                                                        
                                                        <td>{{$total_valor_facturado}}</td>

                                                        <td>{{$total_debido}}</td>
                                                        <td>{{$total_credito}}</td>
                                                        <td>{{$total_divida}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> <!-- end table-responsive -->
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row -->
                            @else
                                   
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table mt-4 table-centered" class="display nowrap">
                                                <thead>
                                                    <center><strong>
                                                            <h4 class="text-muted">Relatório de Empresas Cadastradas</h4>
                                                        </strong></center>
                                                    
                                                    <tr>
                                                        <th>Empresa</th>
                                                        <th>tipo</th>
                                                        <th>telefone</th>
                                                       <!--  <th>email</th> -->
                                                        <th>nuit</th>
                                                       <!--  <th>localizacao</th> -->
                                                        <th>largura Banda</th>
                                                       <!--  <th>url</th> -->
                                                        <!--<th>data contrato</th> -->
                                                       <!--  <th>descricao</th> -->
                                                        
                                                    </tr>
                                                
                                                </thead>
                                                <tbody>
                                                    @foreach($empresas as $items)
                                                        <tr>
                                                        
                                                            <td>{{$items->empresa}}</td>
                                                            <td>{{$items->tipo_empresa}}</td>
                                                            <td>{{$items->telefone}}</td>
                                                         <!--    <td>{{$items->email}}</td> -->
                                                            <td>{{$items->nuit}}</td>
                                                          <!--   <td>{{$items->localizacao}}</td> -->
                                                            <td>{{$items->largura_banda_contratada}}</td>
                                                           <!--  <td>{{$items->url}}</td> -->
                                                         <!--    <td>{{$items->data_contrato}}</td> -->
                                                           <!--  <td>{{$items->descricao}}</td> -->
                                                        
                                                        </tr>
                                                        
                                                    @endforeach
                                                    @if($total_empresas > 1)
                                                        <tr>
                                                            <th>Total</th>
                                                        
                                                            <td>
                                                            <td></td><td></td>
                                                        
                                                            <td>{{$total_empresas}}</td>
                                                        </tr>
                                                       
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div> <!-- end table-responsive -->
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row -->
                            @endif
                            <!-- end row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="clearfix pt-5">
                                        <!--<h6 class="text-muted">Notes:</h6>-->
                                        <small class="text-muted">
                                            Documento processado por computador.
                                        </small>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="mt-5 mb-1">
                                <div class="text-right d-print-none">
                                    <a href="javascript:window.print()" class="btn btn-primary"><i class="uil uil-print mr-1"></i> Imprimir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div> <!-- container-fluid -->

    </main> <!-- content -->
@endsection    
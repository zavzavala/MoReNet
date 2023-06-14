@extends('back.layouts.tables-layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Empresa')
@section('content')
<br><br><br>

<div>
    <center><h1>Dados de Facturação</h1></center><br><br><br><br>
    <div class="row">
        <form action="<?= route('autor.buscarDados') ?>" method="post">
            @csrf
            <div class="col-md-6 mb-3">
                
                <label></label>
                <input type="text" class="form-control" placeholder="Pesquisar..." name='search'> 
                <button class="btn btn-info" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
            <div class="col-md-2 mb-3">
                <label for="" class="form-label">Empresa</label>
                <select class="form-select" name='empresa'>
                    <option value="">-- No selected ---</option>
                    @foreach (\App\Models\empresa::all() as $empresa)
                        <option value="{{ $empresa->id }}">{{ $empresa->empresa }}</option>
                    @endforeach
                    
                </select>
            </div>

            @if (auth()->user()->type == 1)
                
        
            <div class="col-md-2 mb-3">
                <label for="" class="form-label">Semestre</label>
                <select  class="form-select" name='semestre'>
                    <option value="">-- No selected ---</option>
                    <option value="2">Ultimos 2 dias</option>
                    <option value="7">Ultimos 7 dias</option>
                    <option value="30">Ultimos 30 dias</option>
                    <option value="90">Ultimo trimestre</option>
                    <option value="120">Ultimo semestre</option>
                    
                </select>
            </div>

            @endif
            <div class="col-md-2 mb-3">
                <label for="" class="form-label">Visualizar</label>
                <select class="form-select" name='AndOr'>
                    <option value="AND">Somente da empresa</option>
                    <option value="OR">Todos outros</option>
                </select>
                <strong style="color:red">NOTA: Este campo permite filtar os dados da pesquisa seguindo o critério acima nos intervalos definos nos demais campos!</strong>
            </div>
        </form>
    </div>
   
   <!-- 
   <div class="d-block mt-2">
   <div class="panel panel-default">
            <div class="panel-heading">
                Relatório <span> <a style="color:white;" href="" target="_blank"><i title="Emitir Relatorio" style="font-size: 22px;float: right; padding:0px 10px" class="fa fa-print"></i></a>
                
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-report">
                        <thead>
                            <tr>

                                <th>Empresa</th>
                                <th>comprovativo</th>
                                <th>total_contratada</th>
                                <th>banda_facturada</th>
                                <th>aumento</th>
                                <th>total_diminuicao</th>
                                <th>debito</th>
                                <th>credito</th>
                                <th>divida</th>
                                <th>Ação</th>
 
                            </tr>
                        </thead>
                        <tbody>
                            
                                <tr class="odd gradeX">
                                    
                                
                                    


                                </tr>
                                
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        End Advanced Tables
   </div> -->

</div>

@endsection
@push('scripts')
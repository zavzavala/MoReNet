@extends('back.layouts.tables-layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Empresa')
@section('content')
<br><br><br>

<div>
        <center><h1>Dados de Empresas</h1></center>
        <br><br><br>
    <div class="row">
        @if (auth()->user()->type == 1)

            <form action="<?= route('autor.buscarDadosFacturacao') ?>" method="post">
                @csrf
                <div class="col-md-6 mb-3">
                    
                <button class="btn btn-success" type="submit">Pesquisar</button>

                <input type="text" class="form-control" placeholder="Pesquisar..." name='search'> 
                </div>
                <div class="col-md-2 mb-3">
                    <label for="" class="form-label">Empresa</label>
                    <select class="form-select" name='empresa'>
                        <option value="">-- Selecione ---</option>
                        <option value="todas" name="todas">Ver Todas</option>

                        @foreach (\App\Models\empresa::all() as $empresa)
                            <option name="empresas" value="{{ $empresa->id }}">{{ $empresa->empresa }}</option>
                        @endforeach
                        
                    </select>
                </div>

                    
                <div class="col-md-2 mb-3">
                    <label for="" class="form-label">Tipo de Empresa</label>
                    <select class="form-select" name='tipo'>
                    <option value="">-- Selecione ---</option>
                    @foreach (\App\Models\empresa::all() as $empresa)
                            <option value="{{ $empresa->tipo_empresa }}">{{ $empresa->tipo_empresa }}</option>
                        @endforeach
                    </select>
                    
                </div>

            
                    <!-- <div class="col-md-2 mb-3">
                        <label for="" class="form-label">Visualizar</label>
                        <select class="form-select" name='AndOr'>
                            <option value="AND">Somente da empresa</option>
                            <option value="OR">Todos outros</option>
                        </select>
                        <strong style="color:red">NOTA: Este campo permite filtar os dados da pesquisa seguindo o critério acima nos intervalos definos nos demais campos!</strong>
                    </div> -->

        @endif
        </form>
    </div>
   

</div>

@endsection

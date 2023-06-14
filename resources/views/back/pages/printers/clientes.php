<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .instituicao-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .instituicao-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .instituicao-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg {
            background-color: #414ab1;
            color: #fff;
        }
        .cabecalho{
            
           
            color:black;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            

        }
    </style>
</head>
<body>

    <table class="instituicao-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                     <img src="{{asset('img/logo.png')}}" alt="" width="100px" style="align-content: centered;"><br>
                                    
                    <h2 class="text-start">Clientes</h2>
                </th>
                <th width="50%" colspan="2" class="text-end instituicao-data">
                <span>Data: {{\Carbon\Carbon::now()->format('d-m-y')}}</span> <br>

                </th>
            </tr>
            <tr class="bg">
                <th width="50%" colspan="2">Dados do Cliente</th>
                <th width="50%" colspan="2">outros Details</th>
            </tr>
        </thead>
        +"id": 2
      +"user_id": 1
      +"empresa": "Vodacom"
      +"telefone": "844597878"
      +"email": "vodacom@gmail.com"
      +"localizacao": "Guerra Popular"
      +"nuit": 4567890
      +"largura_banda_contratada": 100
      +"tipo_empresa": "TVET"
      +"url": "vodacom.com"
      +"data_contrato": "2023-04-12"
      +"descricao": "Informacao"
      +"deleted_at": null
      +"created_at": "2023-04-18 13:04:41"
      +"updated_at": "2023-04-18 13:04:41"
        <tbody>
            @foreach($empresas as $items)
                <tr>
                    <td class="cabecalho">Código</td>
                    <td>{{$items['id']}}</td>

                    <td class="cabecalho">Instituição</td>
                    <td>{{$items['empresa']}}</td>
                </tr>
                <tr>
                    <td class="cabecalho">Tipo</td>
                    <td>{{$items['tipo_empresa']}}</td>

                    <td class="cabecalho">Telefone</td>
                    <td>{{$items['telefone']}}</td>
                </tr>
                <tr>
                    <td class="cabecalho">email</td>
                    <td>{{$items['email']}}</td>

                    <td class="cabecalho">localizacao</td>
                    <td>{{$items['localizacao']}}</td>
                </tr>
                <tr>
                    <td class="cabecalho">nuit</td>
                    <td>{{$items['nuit']}}</td>

                    <td class="cabecalho">url</td>
                    <td>{{$items['url']}}</td>
                </tr>
                <tr>
                    <td class="cabecalho">largura_banda_contratada</td>
                    <td>{{$items['largura_banda_contratada']}}</td>

                    <td class="cabecalho">data_contrato</td>
                    <td>{{$items['data_contrato']}}</td>
                </tr>
                <tr>
                    <td class="cabecalho">descricao</td>
                    <td>{{$items['descricao']}}</td>

                    <td class="cabecalho">created_at</td>
                    <td>{{$items['created_at']}}</td>
                </tr>
            @endforeach
           
            <tr>
                
                <td colspan="3" class="total-heading" style="color:white;background-color:brown">Total Instituicoes</td>
                <td colspan="1" class="total-heading" style="color:white;background-color:brown">{{$total}}</td>
                                                
            </tr>                               
        </tbody>
    </table>


    <br>
   

</body>
</html>
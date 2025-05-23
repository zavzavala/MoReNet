@extends('back.layouts.pages-layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Home')

@section('content')

    <br></br></br></br>
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-green">
                <div class="panel-body">
                    <i class="fa fa-bar-chart-o fa-5x"></i>
                  
                        <h3><?= (number_format("$facturado", 2, ",", ".") == 0 ? "0" :number_format("$facturado", 2, ",", ".")) ?> Mzn </h3>
                   
                
                </div>
                <div style="background-color:#006400; color:white" class="panel-footer back-footer-green">
                    Valor de Empresas Facturadas

                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-red">
                <div class="panel-body">
                    <i class="fa fa-edit fa-5x"></i>
                    

                    <h3> <?= number_format("$debito", 2, ",", ".") == 0 ? "0" :number_format("$debito", 2,",",".") ?> Mzn </h3>
                </div>
                <div style="background-color:#db0610;color:whitesmoke" class="panel-footer back-footer-red">
                    Débito Total

                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="row">


        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dados de Empresas Facturadas 
                </div>
                <div class="panel-body">
                    <div id="columnchart_material" style="width: 100%; height: 200px;"></div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Valores de Crédito e Débito 
                </div>
                <div class="panel-body">

                    <div id="donutchart" style="width: 100%; height: 200px;"></div>

                </div>
            </div>
        </div>

        <hr />

    </div>
    </br></br></br></br>
@endsection

<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
  <script src="assets/js/morris/morris.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>



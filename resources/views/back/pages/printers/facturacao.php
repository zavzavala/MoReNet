<?php


$html = '<table border=1';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<td style="width:10px"><b>Codigo</b></td>';
$html .= '<td style="width:100px"><b>Empresa</b></td>';
$html .= '<td style="width:100px"><b>Largura Banda</b></td>';
$html .= '<td style="width:30px"><b>Aumento Banda</b></td>';
$html .= '<td style="width:100px"><b>Factura Nr</b></td>';
$html .= '<td style="width:20px"><b>Valor Facturado</b></td>';
$html .= '<td style="width:20px"><b>Data Pagamento</b></td>';

$html .= '</tr>';
$html .= '</thead>';


for ($i=0; $i<count($data) ; $i++) { 
    $html .= '<tbody>';
    $html .= '<tr><td>' .$data[$i]['id'] . "</td>";
    $html .= '<td>' .$data[$i]['empresa_id'] . "</td>";
    $html .= '<td>' .$data[$i]['largura_banda'] . "</td>";
    $html .= '<td>' .$data[$i]['aumento_banda']."</td>";
    $html .= '<td>' .$data[$i]['n_factura']."</td>";
    $html .= '<td>' . $data[$i]['valor_facturado'] . 'MZN'."</td>";   
    $html .= '<td>' .$data[$i]['data_pagamento']."</td><tr>";
    $html .= '</tbody>';
}

$html .= '</table>';
//referenciar o DomPDF com namespace
use Dompdf\Dompdf;
// include autoloader
require_once('./back/dompdf/autoload.inc.php');

//Criando a Instancia
$dompdf = new DOMPDF(['enable_remote' =>true]);
// Carrega seu HTML


    $dados = '<img src="../back/static/logo.png" width="110" height="32" alt="Logo" style="text-align: center;">';
    $dados .= '<h1 style="text-align: center;"><br>DAF - Gerar PDF</h1>';
   
$dompdf->loadHtml('
        '.$dados.'
        '.$html .'
    ');

//Renderizar o html
//$dompdf->setPaper('A4',);
$dompdf->setPaper('A4');

$dompdf->render();

//Exibibir a página
$dompdf->stream(
    "rel_Facturas.pdf", 
    array(
        "Attachment" => false //Para realizar o download somente alterar para true
    )
);

?>
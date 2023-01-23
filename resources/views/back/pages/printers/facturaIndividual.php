<?php




use Dompdf\Dompdf;

require_once('./back/dompdf/autoload.inc.php');

//criar a Instancia
$dompdf = new Dompdf(['enable_remote' => true]);

//os dados serao chamados para aqui
$dompdf->loadHtml('

');

$dompdf->setPaper('A4');

$dompdf->render();


//Exibir a pagina

$dompdf->stream(
    "relatorio_facturacao.pdf",
    array(
        "Attachment"=> false //colocar true para realzar o download
    )

);

?>
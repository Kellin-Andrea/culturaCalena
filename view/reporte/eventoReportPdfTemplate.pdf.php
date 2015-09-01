<?php


use mvc\routing\routingClass as routing;

class PDF extends FPDF
{

function Header()
{
    




$this->Image(routing::getInstance()->getUrlImg('logo.png'),230,10,60); 

$this->Image(routing::getInstance()->getUrlImg('fpdf.png'),40,30,230);


$this->SetFont('Courier','',12);
$txt=(date("d-m-Y H:i:s"));

$this->MultiCell(0,5,$txt,0,'J');
$this->Ln(15);
    // Arial bold 15
    $this->SetFont('Times','B',15);
    // Movernos a la derecha
    $this->Cell(100);
    // Título
    $this->Cell(50,1,'Reporte  De Eventos Creados',40,0,'C');
    // Salto de línea
    $this->Ln(30);
}


// Pie de página
function Footer()
{
    
    $this->SetY(-15);
 
    $this->SetFont('Times','I',8);
    // Número de página
    $this->Cell(0,10,'© 2015 - 2016 Cultura Calena. All rights reserved. Cultura Calena',0,0,'C');

}
}




$pdf = new PDF('L','mm','A4');
$pdf->AddPage();

$pdf->SetFont('Times','B',16);



$pdf->Cell(100,5,'Nombre',1,0);
//$pdf->Ln();

$pdf->Cell(40,5, 'Categoria',1,0);

$pdf->Cell(55,5, 'Fecha Inicial Evento',1,0);



$pdf->Cell(65,5, 'Fecha Inicial Publicacion',1,0);



$pdf->Ln(8);
foreach ($objEventoCate as $data){

$pdf->SetTextColor(0,0,0);

$pdf->Cell(100,5,  utf8_decode($data->evento),1,0,'C');

$pdf->Cell(40,5,  utf8_decode($data->nombre),1,0,'C');

$pdf->Cell(55,5,  utf8_decode($data->fecha_inicial_evento),1,0,'C');


$pdf->Cell(65, 5,  utf8_decode($data->fecha_inicial_publicacion),1,0,'C');




$pdf->Ln();
}

$pdf->Ln();







//$pdf->Cell(55,10,  utf8_decode(date("d-m-Y H:i:s")),1);
$pdf->SetFont('Times','',12);
$txt="Este reporte  se encuentran todos los eventos creados filtrados por categorias y entre las fechas de publicacion deseadas ";

$pdf->MultiCell(0,5,$txt,20,'J');



$pdf->Output();


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
    $this->Cell(50,1,'Reporte  De Categoria Mas Popular',40,0,'C');
    // Salto de línea
    $this->Ln(35);
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

$pdf->Cell(50,9);


$pdf->Cell(100,9,'Numero De Eventos',1,0,'C');


$pdf->Cell(55,9, 'Categorias',1,0,'C');






$pdf->Ln(8);
foreach ($objCateEvento as $data){

$pdf->SetTextColor(77, 78, 78);

$pdf->Cell(50,9);

$pdf->Cell(100,9,  utf8_decode($data->conteo),1,0,'L');



$pdf->Cell(55,9,  utf8_decode($data->nombre),1,0,'C');







$pdf->Ln();
}

$pdf->Ln();







//$pdf->Cell(55,10,  utf8_decode(date("d-m-Y H:i:s")),1);
$pdf->SetFont('Times','',12);
$pdf->Cell(30,5);
$txt="Este reporte es para saber cuantos eventos son creados por categoria con el cual se podra dar cuenta el administrador cual es la categoria mas popular ";

$pdf->MultiCell(0,5,$txt,20,'C');



$pdf->Output();


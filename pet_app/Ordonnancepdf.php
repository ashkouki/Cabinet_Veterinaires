<?php 
require_once("tcpdf.php");


if (isset ($_POST['create'])) {
    

   $ord = $_POST['ord'];
      
		 $date=date("m/d/Y");
$pdf= new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF_8', false);


// $pdf -> SetCreator('HOW CAN I DO IT');
// $pdf -> SetAuthor('HOW CAN I DO IT');
$pdf -> SetTitle('بطاقة تقييم');
$pdf->SetPrintHeader(false);

$pdf->AddPage();


$pdf->SetFont('aealarabiya','',15);
$pdf->Ln();

//orientation de doroite a gauche
$pdf->SetRTL(false);


// 1ere ligne
$pdf->Cell(6);
$pdf->Cell(0,0,'Docteur MISSAOUI SARRA                                           ميساوي  سارة الحكيمة ');
$pdf->Ln();

// 2eme ligne
$pdf->Cell(6);
$pdf->Cell(0, 0, '     Medcein Veterinaire                                                         بيطري طب ');
$pdf->Ln();

// 3eme ligne
$pdf->Cell(6);
$pdf->Cell(0, 0, '74,Av. Habib Bourguiba -Arina                               أريانة - بورقيبة الحبيب شارع 74 ');
$pdf->Ln();

$pdf->Ln(0.80);
$pdf->Cell(6);
$pdf->Cell(0, 0, ' Tel: 28 106 024 - 71 713 011                             28 106 024-71 713 011 :الهاتف');
$pdf->Ln();

$pdf->Ln(0.80);

$pdf->Cell(7);
$pdf->Cell(0, 0, "                                                                               Tunis Le:  " .$date);

$pdf->Ln();




//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set JPEG quality
$pdf->setJPEGQuality(60);

// Image example with resizing

$pdf->Image('img/logo.png', 95,45, 25, 25, '', '', 'T', false, 600, '', false, false, 4, false, false, false);




//$pdf -> SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

//$pdf -> SetHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf -> SetFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));


$pdf -> SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf -> SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP,PDF_MARGIN_RIGHT);
// $pdf -> SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf -> SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf -> SetImageScale(PDF_IMAGE_SCALE_RATIO);

$lg=Array();
$lg['a_meta_charset']='UTF_8';

$lg['w_page']='page';

$pdf->Ln(3);
$pdf->SetLanguageArray($lg);

// titre
$pdf->SetFont('aealarabiya','',30);

$pdf->Cell(110, 20, ' ',0,1,'C');
$pdf->Cell(0, 0,'ORDONANCE', 0, 1, 'C', 0, '', 1);

$pdf->SetFont('aealarabiya','B',15);
$pdf->Ln(8);


$x1=10;
$y1=50;
$sizeX=100;
$sizeY=10;
 



$pdf->MultiCell(180, 10,$ord, 0, "L", 0);






ob_end_clean();

$nom_a="Ordonnance";

//$pdf->Output($fnom."_".$date'.pdf', "I");
	$pdf->Output($nom_a."_".$date.".pdf", "I");


}



?>
<?php 
require_once("tcpdf.php");


if (isset ($_POST['create'])) {
    $fnom = $_POST['fnom'];

   $tel = $_POST['tel'];
      $Adresse = $_POST['Adresse'];
	     $Suivi = $_POST['Suivi'];  
		 $nom_a = $_POST['nom_a'];  
		 $type_a = $_POST['type_a'];  
		 $sexe = $_POST['sexe'];  
		 $age = $_POST['age'];  
		  $age = $_POST['age'];  
		 $count2 = 2;  
		 	 $date_Vaccin = $_POST['date_Vaccin'];  
			 	 $Motif_Vaccin = $_POST['Motif_Vaccin']; 
				 
				  $count1 = $_POST['count1']; 
				  
				  $date_consultation = $_POST['date_consultation'];  
			 	 $Motif_consultation = $_POST['Motif_consultation']; 
				 
				  $count2 = $_POST['count2'];
		 $date=date("d/m/Y");
$pdf= new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF_8', false);


// $pdf -> SetCreator('HOW CAN I DO IT');
// $pdf -> SetAuthor('HOW CAN I DO IT');
$pdf -> SetTitle('Fiche Suivi');
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

$pdf->Ln(0.99);

$pdf->Cell(7);
$pdf->Cell(0, 0, "                                                                               Tunis Le:  " .$date);

$pdf->Ln();




//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set JPEG quality
$pdf->setJPEGQuality(60);

// Image example with resizing

$pdf->Image('img/logo.png', 95,45, 25, 25, '', '', 'T', false, 600, '', false, false, 4, false, false, false);

$pdf->Ln();



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


$pdf->SetLanguageArray($lg);

// titre
$pdf->SetFont('times','',35);

$pdf->Cell(60, 20, ' ',0,1,'C');
$pdf->Cell(0, 0, 'Fiche Suivi des Animaux', 1, 1, 'C', 0, '', 2);

$pdf->SetFont('aealarabiya','B',15);
$pdf->Ln(3);

	$pdf->Cell(100,10,"Nom et Prenom : ".$fnom,0,0);
	$pdf->Cell(20,10,"Adresse: ".$Adresse,0,1);

$pdf->Cell(100,10,"N° Téléphone : ".$tel,0,0);
$pdf->Ln(8);
$pdf->Cell(30, 10, '',0,1,'C');
   $pdf->SetTextColor(25,25,112);
   $pdf->SetFont('aealarabiya','B',15);

$pdf->Write(0, "Infos Sur Animal"); 

$pdf->SetTextColor(0,0,0);
$pdf->Ln(8);
$pdf->SetFont('aealarabiya','B',15);

	$pdf->Cell(100,10,"Nom  : ".$nom_a,0,0);
	$pdf->Cell(20,10,"Catégorie: ".$type_a,0,1);

$pdf->Cell(100,10,"Age : ".$age,0,0);
$pdf->Cell(100,10,"Sexe : ".$sexe,0,1);
$pdf->Ln(10);
$pdf->SetTextColor(25,25,112);
$pdf->Write(0, "Historique des Consultations"); 
$pdf->SetTextColor(0,0,0);
$pdf->Ln(10);


	
	$x1=8;
$y1=40;
$sizeX=90;
$sizeY=8;
 


$pdf->SetFont('aealarabiya','',12);

if($Motif_consultation=="")
{
$pdf->Write(0, "NB : Pas de consultation jusqu'à présent"); 
}
else
	

	{
		$pdf->Cell(10,10,"#",1,0,"C");
	
	$pdf->Cell(100,10,"Dates du consultations",1,0,"C");
	$pdf->Cell(70,10,"Retours des Consultations",1,1,"C");
	$pdf->SetFont('aealarabiya','',10);
	for ($i=0; $i < $count2 ; $i++) { 
		$pdf->Cell(10,10, ($i+1) ,1,0,"C");
			$pdf->Cell(100,10, $_POST['date_consultation'][$i],1,0,"C");
			
$pdf->SetFont('aealarabiya','',8);
		$pdf->MultiCell(70,10, $_POST['Motif_consultation'][$i],1,"L");
	
$pdf->SetFont('aealarabiya','',10);
		// $pdf->Cell(40,10, ($_GET["qty"][$i] * $_GET["price"][$i]) ,1,1,"C");
	}

}
$pdf->SetFont('aealarabiya','B',15);
$pdf->Ln(10);
$pdf->SetTextColor(25,25,112);
$pdf->Write(0, "Historique des Vaccins"); 
$pdf->SetTextColor(0,0,0);
$pdf->Ln(10);

$pdf->SetFont('aealarabiya','',12);

if($Motif_Vaccin=="")
{
$pdf->Write(0, "NB : Pas encore Vacciner jusqu'à présent"); 
}
else
	{
			$pdf->Cell(10,10,"#",1,0,"C");
	$pdf->Cell(100,10,"Date du Vaccin",1,0,"C");
	$pdf->Cell(70,10,"Type de Vaccin",1,1,"C");
$pdf->SetFont('aealarabiya','',10);
	for ($i=0; $i < $count1 ; $i++) { 
		$pdf->Cell(10,10, ($i+1) ,1,0,"C");
			$pdf->Cell(100,10, $_POST['date_Vaccin'][$i],1,0,"C");
		$pdf->Cell(70,10, $_POST['Motif_Vaccin'][$i],1,1,"C");
	
		// $pdf->Cell(40,10, ($_GET["qty"][$i] * $_GET["price"][$i]) ,1,1,"C");
	}
}


//pied de page


// if ($fgn="1")
// {
// //set image scale factor
// $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// // set JPEG quality
// $pdf->setJPEGQuality(75);

// // Image example with resizing

// $pdf->Image('logo_gn.jpg', 110,66, 5, 5, '', '', 'T', false, 300, '', false, false, 4, false, false, false);
// }
ob_end_clean();


//$pdf->Output($fnom."_".$date'.pdf', "I");
	$pdf->Output($fnom."_".$nom_a."_".$date.".pdf", "I");


}



?>
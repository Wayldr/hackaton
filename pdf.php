<?php
// Connexion à la BDD (à personnaliser)



$db = new PDO('mysql:host=localhost;dbname=faq;charset=utf8', 'root', '');

// Appel de la librairie FPDF
require("fpdf/fpdf.php");

// Création de la class PDF
class PDF extends FPDF {
    // Header
   function header_table(){
    $this->SetFont('Times','B',12);
    $this->Cell(95,10,'Question',1,0,'C');
    $this->Cell(95,10,'Reponse',1,0,'C');   
    }
    function viewtable($db){
        $this->SetFont('Times','',12);
        $stmt = $db->query('SELECT question,reponse FROM la_faq');
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
            $this->Cell(95,20,$data->question);
            $this->Cell(95,20,$data->reponse);
            $this->Ln();
        }
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->header_table();
$pdf->viewtable($db);
$pdf->Output();
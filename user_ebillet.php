<?php
require_once('../fpdf/fpdf.php');
require_once("../phpqrcode/qrlib.php");
include '_db.php';
include '_functions.php';
include 'user__queries.php';


$row = mysqli_fetch_array($results_dossier_update_view, MYSQLI_ASSOC);

$nom = mb_convert_encoding($row['nom'], 'Windows-1252', 'UTF-8');
$prenom = mb_convert_encoding($row['prenom'], 'Windows-1252', 'UTF-8');
$date_naissance = mb_convert_encoding($row['date_naissance'], 'Windows-1252', 'UTF-8');
$adresse = mb_convert_encoding($row['adresse'], 'Windows-1252', 'UTF-8');
$code_postal = mb_convert_encoding($row['code_postal'], 'Windows-1252', 'UTF-8');
$ville = mb_convert_encoding($row['ville'], 'Windows-1252', 'UTF-8');
$num_tel = mb_convert_encoding($row['num_tel'], 'Windows-1252', 'UTF-8');
$num_ss = mb_convert_encoding($row['num_ss'], 'Windows-1252', 'UTF-8');
$allergie_regime = mb_convert_encoding($row['allergie_regime'], 'Windows-1252', 'UTF-8');
$nom_prenom_cu = mb_convert_encoding($row['nom_prenom_cu'], 'Windows-1252', 'UTF-8');
$lien = mb_convert_encoding($row['lien'], 'Windows-1252', 'UTF-8');
$num_tel_cu = mb_convert_encoding($row['num_tel_cu'], 'Windows-1252', 'UTF-8');
$ville_etude = mb_convert_encoding($row['ville_etude'], 'Windows-1252', 'UTF-8');
$filiere_etude = mb_convert_encoding($row['filiere_etude'], 'Windows-1252', 'UTF-8');
$annee_etude = mb_convert_encoding($row['annee_etude'], 'Windows-1252', 'UTF-8');
$type_dossier = mb_convert_encoding($row['type_dossier'], 'Windows-1252', 'UTF-8');
$forfait_ski = mb_convert_encoding($row['forfait_ski'], 'Windows-1252', 'UTF-8');
$location_materiel = mb_convert_encoding($row['location_materiel'], 'Windows-1252', 'UTF-8');
$location_casque = mb_convert_encoding($row['location_casque'], 'Windows-1252', 'UTF-8');
$ticket_conso = mb_convert_encoding($row['ticket_conso'], 'Windows-1252', 'UTF-8');
$ticket_tombola = mb_convert_encoding($row['ticket_tombola'], 'Windows-1252', 'UTF-8');
$nb_crit = mb_convert_encoding($row['nb_crit'], 'Windows-1252', 'UTF-8');
$taille_chaussure = mb_convert_encoding($row['taille_chaussure'], 'Windows-1252', 'UTF-8');
$restaurant = mb_convert_encoding($row['restaurant'], 'Windows-1252', 'UTF-8');

QRcode::png("https://aedrp.fr/internium/admin_scan_qrcode?id_billet=" . $id . "", "images/qrcodepng/" . $id . ".png");

class PDF extends FPDF
{
    function Header()
    {
        // Police Arial gras 15
        $this->SetFont('Arial', 'B', 15);
        // Décalage ? droite
        $this->Cell(45);
        // Titre
        //$this->Cell(100,0,"E-BILLET",0,0,'C');
        // Saut de ligne
        $this->Ln(25);
    }

// Pied de page
    function Footer()
    {
        // Positionnement ? 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 8
        $this->SetFont('Arial', 'I', 8);
        // Num?ro de page
        //$this->Cell(0,10,''.$this->PageNo().'/{nb}',0,0,'C');
    }
}

// Instanciation de la classe d?riv?e
$pdf = new PDF('L', 'mm', array(111,250));
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('images/ebillet.jpg', 0, 0, 250);
$pdf->SetFont('Times', 'B', 25);
//$pdf->Cell(150, 11, 'E-BILLET n°' . $id, 1, 1);
$pdf->SetTextColor(105,105,105);
$pdf->SetFont('Times', 'B', 11);
$pdf->MultiCell(0,6,$nom . ' ' . $prenom,0,'C',0,30);
$pdf->MultiCell(0, 6, $annee_etude . ' ' . $filiere_etude . ' ' . $ville_etude,0,'C',0,30);
$pdf->MultiCell(0, 6, $type_dossier.'',0,'C',0,30);
$pdf->MultiCell(0, 6, $ticket_conso . ' Ticket Conso',0,'C',0,30);
if ($forfait_ski == 'Oui') {
    $pdf->MultiCell(0, 10, 'Forfait Ski',0,'C',0,30);
}
else{
    $pdf->MultiCell(0, 10, '',0,'C',0,30);
}
$pdf->MultiCell(0, 5, 'E-BILLET',0,'C',0,30);
$pdf->MultiCell(0, 5, 'n°' . $id,0,'C',0,30);
//$pdf->Cell(150, 9, 'Chambre n? ' . $num_chambre, 0, 1);
$pdf->Image("images/qrcodepng/" . $id . ".png", 111, 80, 28, 28, "png");
//$pdf->Image("images/ebillet_chamrousse.jpg", 10, 230, 185);
$pdf->Output('D', $nom . ' ' . $prenom . ' - E-BILLET n°' . $id . '.pdf');
?>

<?php
require('../fpdf/fpdf.php');
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

if ($type_dossier == 'SC') {
    $prix_dossier = 200;
} else {
    $prix_dossier = 100;
}
if ($forfait_ski == 'Oui') {
    $prix_forfait_ski = 55;
} else {
    $prix_forfait_ski = 0;
}
if ($location_materiel == 'Pack Ski Débutant') {
    $prix_location_materiel = 54;
} elseif ($location_materiel == 'Pack Ski Confirmé' || $location_materiel == 'Pack Snow') {
    $prix_location_materiel = 74;
} else {
    $prix_location_materiel = 0;
}
if ($location_casque == 'Oui') {
    $prix_location_casque = 10;
} else {
    $prix_location_casque = 0;
}
$prix_sejour = $prix_dossier + 10;
$prix_tc_tt = 0.5 * $ticket_conso + 1 * $ticket_tombola;
$prix_matos = $prix_forfait_ski + $prix_location_materiel + $prix_location_casque;

class PDF extends FPDF
{
    function Header()
    {
        // Logo
        $this->Image('images/spacex.png', 10, 12, 25);
        $this->Image('images/spacex.png', 172, 12, 25);
        // Police Arial gras 15
        $this->SetFont('Arial', 'B', 15);

        // Décalage à droite
        $this->Cell(35);
        // Titre
        $this->Cell(120, 25, "Récapitulatif d'inscription à l'INTERNIUM 2021", 1, 0, 'C');
        // Saut de ligne
        $this->Ln(30);
    }

// Pied de page
    function Footer()
    {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 8
        $this->SetFont('Arial', 'I', 8);
        // Numéro de page
        //$this->Cell(0,10,''.$this->PageNo().'/{nb}',0,0,'C');
    }
}
// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 10);
$pdf->Cell(0, 10, '• Participant(e) : ' . $nom . ' ' . $prenom . ' né(e) le ' . $date_naissance, 0, 1);
$pdf->Cell(0, 10, "• Études : " . $annee_etude . ' ' . $filiere_etude . ' ' . $ville_etude, 0, 1);
$pdf->Cell(0, 10, '• Adresse : ' . $adresse, 0, 1);
$pdf->Cell(0, 10, '                  ' . $code_postal . ' ' . $ville, 0, 1);
$pdf->Cell(0, 10, '• N° de téléphone : ' . $num_tel, 0, 1);
$pdf->Cell(0, 10, '• N° de sécurité sociale : ' . $num_ss, 0, 1);
$pdf->Cell(0, 10, '• Allergie ou régime alimentaire  : ' . $allergie_regime, 0, 1);
$pdf->Cell(0, 10, "• Contact en cas d'urgence : " . $nom_prenom_cu . " (" . $lien . ') - ' . $num_tel_cu, 0, 1);
$pdf->Cell(0, 10, "• Type de dossier : " . $type_dossier, 0, 1);
if($prix_tc_tt > 0) {
    $pdf->Cell(0, 10, "• Ticket conso / Ticket tombola : " . $ticket_conso . " (" . $ticket_conso * 0.5 . " €) / " . $ticket_tombola . " (" . $ticket_tombola . " €)", 0, 1);
}
if($prix_matos > 0){
    $pdf->Cell(0, 10, "• Forfait ski / Location matériel / Location casque / Taille chaussure : " . $forfait_ski . ' / ' . $location_materiel . ' / ' . $location_casque . ' / ' . $taille_chaussure, 0, 1);
}
if($restaurant == 'Oui') {
    $pdf->Cell(0, 10, "• Restaurant : " . $restaurant, 0, 1);
}
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(0, 10, "• Récapitulatif des chèques : ", 0, 1);
$pdf->SetFont('Times', '', 10);
if ($type_dossier == 'SC') {
    $pdf->Cell(0, 10, "   - Un chèque de " . $prix_sejour . " €  pour le paiement du séjour dont 10 € d’adhésion inclus à l'ordre de Internium 2021.", 0, 1);
} else {
    $pdf->Cell(0, 10, "   - Un chèque de " . $prix_sejour . " € pour le paiement du séjour dont 10 € d’adhésion inclus à l'ordre de Internium 2021.", 0, 1);
}
if ($prix_tc_tt > 0) {
    $pdf->Cell(0, 10, "   - Un chèque de " . $prix_tc_tt . " € pour le paiement des tickets conso et tombola à l'ordre de Internium 2021.", 0, 1);
}
if ($prix_matos > 0) {
    $pdf->Cell(0, 10, "   - Un chèque de " . $prix_matos . " € pour le paiement des options ski à l'ordre de Internium 2021.", 0, 1);
}
$pdf->Cell(0, 10, "   - Deux chèques de caution individuelles de 50 € et 100 € à l'ordre de Internium 2021.", 0, 1);
$pdf->Cell(0, 10, "   - Trois chèques de caution solidaires de 10 €, 35 € et 200 € à l'ordre de Internium 2021.", 0, 1);
$pdf->Cell(0, 10, " Pour finaliser votre inscription merci de nous renvoyer cette fiche récapitulative ainsi que vos chèques à l'adresse suivante :", 0, 1);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(80, 10, '                                                        ' . '                             GAUCHER Louis', 0, 1);
$pdf->Cell(80, 10, '                                                           ' . '	        		               69 rue de la soif', 0, 1);
$pdf->Cell(80, 10, '                                                        ' . '                              76000 Rouen', 0, 1);
$pdf->Output('D', $nom . ' ' . $prenom . ' - Récapitulatif Internium 2021.pdf');
?>


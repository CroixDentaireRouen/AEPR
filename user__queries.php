<?php
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: signin');
}
$username = $_SESSION['username'];
$query_id = "SELECT MAX(id) FROM users WHERE username ='$username' OR email = '$username'";
$results_id = mysqli_query($db, $query_id);
$id = mysqli_result($results_id);

$query_nom = "SELECT MAX(nom) FROM dossiers_internium WHERE id_dossier = $id";
$query_prenom = "SELECT MAX(prenom) FROM dossiers_internium WHERE id_dossier = $id";
$query_etat_dossier = "SELECT MAX(etat_dossier) FROM dossiers_internium JOIN users ON id = id_dossier WHERE username ='$username' OR email = '$username'";
$query_dossier = "SELECT id FROM users JOIN dossiers_internium ON id = id_dossier WHERE username ='$username' OR email = '$username'";
$query_admin = "SELECT id FROM users WHERE (username ='$username' OR email = '$username') AND admin = 'int'";

$results_nom = mysqli_query($db, $query_nom);
$results_prenom = mysqli_query($db, $query_prenom);
$results_dossier = mysqli_query($db, $query_dossier);
$results_etat_dossier = mysqli_query($db, $query_etat_dossier);
$results_admin = mysqli_query($db, $query_admin);

$nom = mysqli_result($results_nom);
$prenom = mysqli_result($results_prenom);
$etat_dossier = mysqli_result($results_etat_dossier);
$dossier = mysqli_result($results_dossier);

$query_dossier_create = "SELECT nom, prenom, CASE WHEN date_naissance LIKE '%/%' THEN CONCAT(SUBSTR(date_naissance,7,4),'-',SUBSTR(date_naissance,4,2),'-',SUBSTR(date_naissance,1,2))
          ELSE date_naissance END AS date_naissance, adresse, code_postal, ville, num_tel, num_ss, allergie_regime,
           nom_prenom_cu, num_tel_cu, lien FROM sfep WHERE id_dossier = $id";
$results_dossier_create = mysqli_query($db, $query_dossier_create);

$query_dossier_update_view = "SELECT nom, prenom, CASE WHEN date_naissance LIKE '%/%' THEN CONCAT(SUBSTR(date_naissance,7,4),'-',SUBSTR(date_naissance,4,2),'-',SUBSTR(date_naissance,1,2))
          ELSE date_naissance END AS date_naissance, adresse, code_postal, ville, num_tel, num_ss, allergie_regime, nom_prenom_cu, num_tel_cu, lien, ville_etude,
          filiere_etude, annee_etude, type_dossier, forfait_ski, location_materiel, location_casque, ticket_conso, ticket_tombola, restaurant, taille_chaussure,
          nb_crit, etat_dossier, commentaire, date_crea, date_modif FROM dossiers_internium WHERE id_dossier = $id";
$results_dossier_update_view = mysqli_query($db, $query_dossier_update_view);
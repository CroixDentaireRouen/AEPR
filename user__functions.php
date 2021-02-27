<?php
//  CREATE_UPDATE_DOSSIER
if (isset($_POST['dossier_create_update'])) {
    $id = $_POST['id'];
    $create_update = $_POST['create_update'];
    $nom = addslashes(trim($_POST['nom']));
    $prenom = addslashes(trim($_POST['prenom']));
    $adresse = addslashes(trim($_POST['adresse']));
    $date_naissance = $_POST['date_naissance'];
    $code_postal = $_POST['code_postal'];
    $ville = addslashes(trim($_POST['ville']));
    $num_tel = $_POST['num_tel'];
    $num_ss = $_POST['num_ss'];
    $allergie_regime = addslashes($_POST['allergie_regime']);
    $nom_prenom_cu = addslashes($_POST['nom_prenom_cu']);
    $num_tel_cu = $_POST['num_tel_cu'];
    $lien = addslashes($_POST['lien']);
    $ville_etude = $_POST['ville_etude'];
    $filiere_etude = $_POST['filiere_etude'];
    $annee_etude = $_POST['annee_etude'];
    $type_dossier = $_POST['type_dossier'];
    $forfait_ski = $_POST['forfait_ski'];
    $location_materiel = $_POST['location_materiel'];
    $ticket_conso = $_POST['ticket_conso'];
    $ticket_tombola = $_POST['ticket_tombola'];
    $nb_crit = $_POST['nb_crit'];
    $location_casque = $_POST['location_casque'];
    $taille_chaussure = $_POST['taille_chaussure'];
    $restaurant = $_POST['restaurant'];
    $etat_dossier = "En cours de validation";
    if ($create_update == 'c') {
        $query1 = "INSERT INTO dossiers_internium (id_dossier, nom, prenom, date_naissance, adresse, code_postal, ville, num_tel, num_ss,
             allergie_regime, nom_prenom_cu, num_tel_cu, lien, ville_etude, filiere_etude, annee_etude, type_dossier, forfait_ski,
             location_materiel, location_casque, restaurant, taille_chaussure, ticket_conso, ticket_tombola, nb_crit, etat_dossier, date_crea)
             VALUES ($id, '$nom', '$prenom', '$date_naissance', '$adresse', '$code_postal', '$ville', '$num_tel', '$num_ss', '$allergie_regime', '$nom_prenom_cu',
             '$num_tel_cu', '$lien', '$ville_etude', '$filiere_etude', '$annee_etude', '$type_dossier', '$forfait_ski', '$location_materiel', '$location_casque',
             '$restaurant', '$taille_chaussure', $ticket_conso, $ticket_tombola, $nb_crit, '$etat_dossier', DATE_ADD(now(), INTERVAL 1 HOUR))";
    } else {
        $query1 = "UPDATE dossiers_internium SET nom='$nom', prenom='$prenom', date_naissance= '$date_naissance', adresse='$adresse', code_postal='$code_postal', ville='$ville',
                  num_tel='$num_tel', num_ss='$num_ss', allergie_regime='$allergie_regime', nom_prenom_cu='$nom_prenom_cu', num_tel_cu='$num_tel_cu', lien='$lien',
                  ville_etude='$ville_etude', filiere_etude='$filiere_etude', annee_etude='$annee_etude', type_dossier='$type_dossier', forfait_ski='$forfait_ski',
                  location_materiel='$location_materiel', location_casque = '$location_casque', ticket_conso=$ticket_conso, ticket_tombola=$ticket_tombola,
                  taille_chaussure = '$taille_chaussure', restaurant = '$restaurant', nb_crit=$nb_crit,  date_modif = DATE_ADD(now(), INTERVAL 1 HOUR)
                  WHERE id_dossier = $id and etat_dossier != 'Complet et accepté'";
    }
    $query2 = "DELETE FROM sfep WHERE id_dossier = $id";
    $query3 = "INSERT INTO sfep (id_dossier, nom, prenom, date_naissance, adresse, code_postal, ville, num_tel, num_ss,
             allergie_regime, nom_prenom_cu, num_tel_cu, lien, date_modif)
            VALUES ($id, '$nom', '$prenom', '$date_naissance', '$adresse', '$code_postal', '$ville', '$num_tel', '$num_ss', '$allergie_regime', '$nom_prenom_cu',
             '$num_tel_cu', '$lien', DATE_ADD(now(), INTERVAL 1 HOUR))";
    //  Documents du critard
    $errors = array();
    $current_directory = getcwd();
    $uploads_dir = $current_directory . '/dossiers/' . $ville_etude . '/' . $nom . ' ' . $prenom . '/';
    if ($create_update == 'u') {
        deleteDirectory($uploads_dir);
        rmdir($uploads_dir);
    }
    mkdir($uploads_dir, 0701);
    $file_name = $_FILES['ci']['name'];
    $file_size = $_FILES['ci']['size'];
    $file_tmp = $_FILES['ci']['tmp_name'];
    $target_file = $uploads_dir . basename($_FILES['ci']['name']);
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($file_type != "pdf" && $file_type != "jpeg" && $file_type != "jpg" && $file_type != "png") {
        $errors[] = "Carte d'identité - Extension non autorisée, seul les fichiers PDF, PNG et JPG sont autorisés.";
    }
    if ($file_size > 2097152) {
        $errors[] = "Carte d'identité - La taille du fichier ne doit pas déapasser 2 Mb.";
    }
    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "$uploads_dir" . "$file_name");
        rename("$uploads_dir" . "$file_name", "$uploads_dir" . "$nom" . " " . "$prenom" . " - CI." . $file_type);
    }
    $file_name = $_FILES['cs']['name'];
    $file_size = $_FILES['cs']['size'];
    $file_tmp = $_FILES['cs']['tmp_name'];
    $target_file = $uploads_dir . basename($_FILES['cs']['name']);
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($file_type != "pdf" && $file_type != "jpeg" && $file_type != "jpg" && $file_type != "png") {
        $errors[] = "Certificat de scolarité - Extension non autorisée, seul les fichiers PDF, PNG, JPG et JPEG sont autorisés.";
    }
    if ($file_size > 2097152) {
        $errors[] = "Certificat de scolarité - La taille du fichier ne doit pas déapasser 2 Mb.";
    }
    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "$uploads_dir" . "$file_name");
        rename("$uploads_dir" . "$file_name", "$uploads_dir" . "$nom" . " " . "$prenom" . " - CS." . $file_type);
    }
    $file_name = $_FILES['ss']['name'];
    $file_size = $_FILES['ss']['size'];
    $file_tmp = $_FILES['ss']['tmp_name'];
    $target_file = $uploads_dir . basename($_FILES['ss']['name']);
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($file_type != "pdf" && $file_type != "jpeg" && $file_type != "jpg" && $file_type != "png") {
        $errors[] = "Attestation de sécurité sociale - Extension non autorisée, seul les fichiers PDF, PNG, JPG et JPEG sont autorisés.";
    }
    if ($file_size > 2097152) {
        $errors[] = "Attestation de sécurité sociale - La taille du fichier ne doit pas déapasser 2 Mb.";
    }
    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "$uploads_dir" . "$file_name");
        rename("$uploads_dir" . "$file_name", "$uploads_dir" . "$nom" . " " . "$prenom" . " - SS." . $file_type);
    }

    $file_name = $_FILES['rc']['name'];
    $file_size = $_FILES['rc']['size'];
    $file_tmp = $_FILES['rc']['tmp_name'];
    $target_file = $uploads_dir . basename($_FILES['rc']['name']);
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($file_type != "pdf" && $file_type != "jpeg" && $file_type != "jpg" && $file_type != "png") {
        $errors[] = "Attestation de resposabilité civile - Extension non autorisée, seul les fichiers PDF, PNG, JPG et JPEG sont autorisés.";
    }
    if ($file_size > 2097152) {
        $errors[] = 'Attestation de resposabilité civile - La taille du fichier ne doit pas déapasser 2 Mb.';
    }
    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "$uploads_dir" . "$file_name");
        rename("$uploads_dir" . "$file_name", "$uploads_dir" . "$nom" . " " . "$prenom" . " - RC." . $file_type);
        mysqli_query($db, $query1);
        mysqli_query($db, $query2);
        mysqli_query($db, $query3);
        if ($create_update == 'c') {
            $_SESSION['message_user_dossier'] = "Votre dossier a bien été créé !";
        } else {
            $_SESSION['message_user_dossier'] = "Votre dossier a bien été modifié !";
        }
        header('location: user_dossier');
    }
}

//  DELETE DOSSIER
if (isset($_POST['dossier_delete'])) {
    $username = $_SESSION['username'];

    $query_id = "SELECT MAX(id) as id FROM users WHERE username ='$username' OR email = '$username'";
    $results_id = mysqli_query($db, $query_id);
    $id = mysqli_result($results_id);

    $query = "SELECT nom, prenom, ville_etude FROM dossiers_internium WHERE id_dossier = $id";
    $results = mysqli_query($db, $query);
    $row = mysqli_fetch_array($results, MYSQLI_ASSOC);

    $query = "DELETE FROM dossiers_internium WHERE id_dossier = $id";
    mysqli_query($db, $query);
    $errors = array();
    $current_directory = getcwd();
    $uploads_dir = $current_directory . '/dossiers/' . $row['ville_etude'] . '/' . $row['nom'] . ' ' . $row['prenom'] . '/';
    deleteDirectory($uploads_dir);
    rmdir($uploads_dir);
    $_SESSION['message_user_dossier'] = "Votre dossier a été supprimé !";
    header('location: user_dossier');
}
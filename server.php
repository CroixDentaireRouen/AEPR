<?php

// SIGN UP
if (isset($_POST['sign_up'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    if ($password_1 != $password_2) {
        $errors[] = "Les deux mots de passe ne sont pas identiques.";
    }
    $query = "SELECT username FROM users WHERE username = '$username'";
    $resultat = mysqli_query($db, $query);
    $row = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
    if (mysqli_num_rows($resultat) != 0) {
        $errors[] = "Ce nom d'utilisateur existe déjà. Merci de choisir un nom d'utilisateur différent.";
    }
    $query = "SELECT email FROM users WHERE email = '$email'";
    $resultat = mysqli_query($db, $query);
    $row = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
    if (mysqli_num_rows($resultat) != 0) {
        array_push($errors, "Cet email existe déjà. Merci de choisir un email différent.");
    }
    //if (!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}$#', $password_1)) {
    if (strlen($password_1) < 6) {
        $errors[] = "Votre mot de passe doit contenir au moins 6 caractères.";
    }
    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database
        $query = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['message'] = 'Votre compte a été bien créé !';
        header('location: signin');
    }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE (username='$username' OR email = '$username') AND password='$password'";
        $results = mysqli_query($db, $query);
        $query = "SELECT * FROM users WHERE username='$username' OR email = '$username'";
        $results2 = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            header('location: user_dossier');
        } elseif (mysqli_num_rows($results2) == 1) {
            $errors[] = "Mot de passe incorrecte.";
        } else {
            $errors[] = "Nom d'utilisateur ou email incorrecte.";
        }
    }
}

// RESET REQUEST SUBMIT
if (isset($_POST['password_forgotten'])) {
    unset($_SESSION['email']);
    $username = mysqli_real_escape_string($db, $_POST['username']);

    $query = "SELECT email FROM users WHERE username = '$username' OR email = '$username'";
    $resultat = mysqli_query($db, $query);
    if (!$row = mysqli_fetch_array($resultat, MYSQLI_ASSOC)) {
        $errors[] = "Ce nom d'utilisateur ou cette adresse mail n'existe pas.";
    } else {
        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);
        $url = "https://aedrp.fr/internium/password_reset?selector=" . $selector . "&validator=" . bin2hex($token);

        $email = $row['email'];

        $hashed_token = password_hash($token, PASSWORD_DEFAULT);

        $query = "DELETE FROM users_pwdreset WHERE email = '$email'";
        mysqli_query($db, $query);

        $query = "INSERT INTO users_pwdreset (email, selector, token, expires) VALUES ('$email', '$selector', '$hashed_token', DATE_ADD(now(), INTERVAL 2 HOUR))";
        mysqli_query($db, $query);

        $to = $email;
        $subject = "Réinitialisation de mot de passe";

        $message = "Bonjour,\n\n";
        $message .= "Nous avons reçu votre demande de réinitialisation de mot de passe.\n";
        $message .= "Cliquez sur le lien ci-dessous pour effectuer la réinitialisation.\n\n";
        $message .= $url."\n\n";
        $message .= "Si vous n'êtes pas à l'origine de cette demande. Merci de ne pas tenir compte de ce mail.\n\n";
        $message .= "Cordialement,\n\n";
        $message .= "l'Internium Team";

        $headers = "From: Internium 2021<no.reply@internium.aedrp.fr> \n";
        $headers .= "Reply-To: \n";
        $headers .= "Content-Type: text/plain; charset='UTF-8' \n";
        $headers .= "Content-Transfer-Encoding: 8bit";

        mail($to, $subject, $message, $headers);
        $_SESSION['email'] = $email;
        header('location: password_forgotten');
    }
}

// PASSWORD RESET
if (isset($_POST['password_reset'])) {
    $selector = $_GET["selector"];
    $validator = $_GET["validator"];

    if (empty($selector) || empty($selector)) {
        $errors[] = "Merci de refaire une nouvelle demande de réinitialisation de mot de passe.";
    } else {

        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

        $query = "SELECT email, token FROM users_pwdreset WHERE selector = '$selector' AND expires >= DATE_ADD(now(), INTERVAL 1 HOUR)";
        $resultat = mysqli_query($db, $query);

        if (!$row = mysqli_fetch_array($resultat, MYSQLI_ASSOC)) {
            $errors[] = "Merci de refaire une nouvelle demande de réinitialisation de mot de passe.";
        } else {

            $token_bin = hex2bin($validator);
            $token_check = password_verify($token_bin, $row["token"]);

            if (!$token_check) {
                $errors[] = "Merci de refaire une nouvelle demande de réinitialisation de mot de passe.";
            } elseif ($token_check) {
                $email = $row['email'];
                if ($password_1 != $password_2) {
                    $errors[] = "Les deux mots de passe ne sont pas identiques.";
                }
                //if (!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}$#', $password_1)) {
                if (strlen($password_1) < 6) {
                    $errors[] = "Votre mot de passe doit contenir au moins 6 caractères.";
                }
                // register user if there are no errors in the form
                if (count($errors) == 0) {
                    $password = md5($password_1);
                    $query = "UPDATE users SET password = '$password' WHERE email = '$email'";
                    mysqli_query($db, $query);
                    $query = "DELETE FROM users_pwdreset WHERE email = '$email'";
                    mysqli_query($db, $query);

                    $_SESSION['username'] = $username;
                    $_SESSION['message'] = 'Votre mot de passe a été réinitialisé !';
                    header('location: signin');
                }
            }
        }
    }
}
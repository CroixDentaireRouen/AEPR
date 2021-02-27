<?php
include '_db.php';
include 'server.php';
?>
<!DOCTYPE HTML>
<html lang="fr">
<head>
    <title>AEPR | Créer mon compte</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
    <link rel="shortcut icon" sizes="57x57" href="images/logo.jpg">
</head>
<body class="subpage">
<!-- Header -->
<header id="header">
    <div class="logo"><a href="index"><strong>AEPR</strong></a></div>
    <a href="#menu">Menu</a>
</header>
<?php include '_header.php' ?>
<section id="two" class="wrapper style">
    <div class="inner">
        <div class="box">
            <div class="content">
                <header class="align-center">
                    <br/><h2><strong>Créer mon compte</strong></h2>
                </header>
                <!-- Main -->
                <article id="main">
                    <section class="wrapper style4">
                        <div class="inner">
                            <section>
                                <form method="post" action="">
                                    <?php include('_error.php'); ?>
                                    <div class="row uniform">
                                        <label>Nom d'utilisateur
                                            <div class="12u$(medium)l">
                                                <input type="text" name="username" placeholder="Username" value=""
                                                       maxlength="50" required/>
                                            </div>
                                        </label>
                                        <label>Email
                                            <div class="12u$(medium)">
                                                <input type="email" name="email" placeholder="Email" value=""
                                                       maxlength="50"
                                                       required/>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="row uniform">
                                        <label>Mot de passe
                                            <div class="12u$(medium)">
                                                <input type="password" name="password_1" placeholder="******"
                                                       maxlength="100"
                                                       required/>
                                            </div>
                                        </label>
                                        <label>Confirmer le mot de passe
                                            <div class="12u$(medium)">
                                                <input type="password" name="password_2" placeholder="******"
                                                       maxlength="100"
                                                       required/>
                                            </div>
                                        </label>
                                        <div class="12u$">
                                            <ul class="actions">
                                                <li><input type="submit" name="sign_up" value="Créer mon compte"
                                                           class="primary"/>
                                                </li>
                                                <li><input type="button" value="Retour"
                                                           onclick="location.href='signin'"/></li>
                                            </ul>
                                        </div>
                                    </div>
                                </form>
                                Vous êtes déjà membre ? <a href="signin"><strong>Connexion</strong></a>.<br/>
                        </div>
            </div>
        </div>
</section>
<?php
include '_footer.php';
include '_scripts.php'
?>
</body>
</html>
<?php
include '_db.php';
include 'server.php';
?>
<!DOCTYPE HTML>
<html lang="fr">
<head>
    <title>AEPR | Mot de passe oublié</title>
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
                    <br/><h2><strong>Mot de passe oublié</strong></h2>
                </header>
                <b><?php if (isset($_SESSION['email'])) { ?>
                        <div class="msg">
                            <b><p style="background-color:rgb(0,0,255);">Un courriel vient d'être envoyé à l'adresse
                                    suivante: "<?php echo $_SESSION['email'] ?>" !<br/>
                                    Si vous n'avez rien reçu d'ici 3 minutes, merci de vérifier dans le courrier
                                    indisréable "Spam".</p></b>
                        </div>
                    <?php }
                    ?>
                </b><br/>
                <form method="post" action="">
                    <?php include('_error.php'); ?>
                    <p>Entrez votre votre nom d'utilisateur, ou l'adresse email avec laquelle vous vous êtes
                        inscrit.<br/> Nous allons vous envoyer un courriel avec un lien pour
                        réinitialiser votre mot de passe.</p>
                    <div class="row uniform">
                        <label>Nom d'utilisateur ou Email
                            <div class="c12u$(medium)">
                                <input type="text" name="username" placeholder="Username ou Email" value=""
                                       maxlength="50"
                                       required/>
                            </div>
                        </label>
                        <div class="12u$">
                            <ul class="actions">
                                <li><input type="submit" name="password_forgotten"
                                           value="Envoyer" class="primary"/></li>
                                <li><input type="button" value="Retour" onclick="location.href='signin'"/></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</section>
<br/><br/><br/><br/><br/><br/>
<?php
include '_footer.php';
include '_scripts.php'
?>
</body>
</html>
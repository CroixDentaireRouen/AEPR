<?php
include '_db.php';
include 'server.php';
?>
<!DOCTYPE HTML>
<html lang="fr">
<head>
    <title>AEPR | Annonces</title>
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
<section id="two" class="wrapper style4">
    <div class="inner">
        <div class="box">
            <div class="content">
                <header class="align-center">
                    <br/><h2><strong>Annonces : Nouveau système d’offre d’emploi</strong></h2>
                </header>
                <p>Nous sommes désormais en partenariat avec ClubOfficine, la plateforme d’emploi des métiers de la
                    pharmacie. Nous utilisons donc maintenant ce système de gestion et de diffusion d’offres
                    d’emploi.</p>
                <p>Pour publier vos offres, <a
                            href="https://www.clubofficine.fr/offres/creation/categorie"
                            target="_blank"> suivez ce lien</a>.</p>
                <p>Pour tout besoin d’assistance, contactez Frédéric, pharmacien & fondateur de ClubOfficine au
                    0687410019 .</p>
                <div class="iframe-container">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/PY3rgwRpcr0" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include '_scripts.php' ?>
<?php include '_footer.php' ?>
</body>
</html>
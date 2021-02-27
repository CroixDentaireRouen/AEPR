<?php
include '_db.php';
include 'server.php';
?>
<!DOCTYPE HTML>
<html lang="fr">
<head>
    <title>AEPR | Panier de Légumes</title>
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
<?php include '_header.php'?>
<section id="two" class="wrapper style">
    <div class="inner">
        <div class="box">
            <div class="content">
                <header class="align-center">
                    <br/><h2><strong>Panier de Légumes</strong></h2>
                </header>
                <p>Tous les 15 jours, l’AEPR, le BDE infirmiers Rouen et l’AESFR te proposent un panier de fruits et
                    légumes de saison pour 5 euros.<br/>
                    (ATTENTION, panier non payé = panier non commandé)</p>
                <p>Commande ton panier ici jusqu’au 6 mars à midi et n’oublie pas de venir le récupérer à la corpo
                    pharma le mardi 10 mars !
                    <br/>Tu as jusqu’au vendredi 6 mars 14h pour régler ton panier (espèces, chèque ou Lydia) à la corpo
                    pharma ! 🙂
                    <br/>Et n’oublie pas de venir chercher ton panier avant le vendredi 13 mars !</p>
                <p>Pour passer commande il te suffit de remplir ce google doc : <a
                            href="https://docs.google.com/forms/d/e/1FAIpQLSdmtGlVKA4nxDE7P_rt2YU3lm-acqEonW9384Kwmna29Qaksw/closedform"
                            target="_blank">panier
                        de légumes</a></p>

                <span class="image fit"><img src="images/panier_de_legumes.jpeg"
                                             alt=""/></span>
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
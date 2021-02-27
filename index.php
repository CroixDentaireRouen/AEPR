<?php
include '_db.php';
include 'server.php';
?>
<!DOCTYPE HTML>
<html lang="fr">
<head>
    <title>AEPR</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
    <link rel="shortcut icon" sizes="57x57" href="images/logo.jpg">
</head>
<body>
<!-- Header -->
<header id="header" class="alt">
    <a href="#menu">Menu</a>
</header>
<?php include '_header.php' ?>
<!-- Banner -->
<section class="banner full">
    <article>
        <img src="images/bg.jpeg" alt=""/>
        <div class="inner">
            <header>
                <p><strong>Association des Étudiants en Pharmacie de Rouen</strong></p>
                <h2></h2>
            </header>
        </div>
    </article>
</section>
<br/><br/><br/>
<!-- One -->
<section id="one" class="wrapper style4">
    <div class="inner">
        <div class="grid-style">
            <div>
                <div class="box">
                    <div class="image fit">
                        <img src="images/banner_corpo.png" alt=""/>
                    </div>
                    <div class="content">
                        <header class="align-center">
                            <h2>La Corpo Pharma</h2>
                        </header>
                        <p> L’AEPR est la plus grande et la plus ancienne association de représentation des étudiants en
                            pharmacie de Rouen. Forte d’une existence de plus d’un demi-siècle, l’AEPR se charge de
                            réaliser
                            de nombreuses missions pour les étudiants mais aussi pour les professionnels.</p>
                        <footer class="align-center">
                            <a href="corpo" class="button alt">Lire la suite</a>
                        </footer>
                    </div>
                </div>
            </div>
            <div>
                <div class="box">
                    <div class="image fit">
                        <img src="images/esport.jpeg" alt=""/>
                    </div>
                    <div class="content">
                        <header class="align-center">
                            <h2>E-sport</h2>
                        </header>
                        <p> Le CM e-sport a créé un Discord « Pharma Rouen » de manière à pouvoir ajouter tous les
                            étudiants
                            en pharmacie de Rouen qui le souhaitent, ce qui pourra faciliter les discussions de groupe à
                            distance, que ce soit pour des réunions, pour travailler sur des TP, sur des comptes-
                            rendus,
                            etc.</p>
                        <footer class="align-center">
                            <a href="esport" class="button alt">Lire la suite</a>
                        </footer>
                    </div>
                </div>
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
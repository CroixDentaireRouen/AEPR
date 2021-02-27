<?php
include '_db.php';
include 'server.php';
?>
<!DOCTYPE HTML>
<html lang="fr">
<head>
    <title>AEPR | Boutique</title>
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
                    <br/><h2><strong>Boutique</strong></h2>
                </header>
                <p>Depuis cette année, la corpo pharma vous propose de vous rhabiller aux couleurs de la pharmacie !</p>
                <p>Disponible à partir du 4 novembre 2019, le « <b>welcome-pack</b> » vous permet de vous équiper comme
                    il faut. 😉</p>
                Package :
                <ul>
                    <li>Tee-shirt, casquette, tote bag et éco-cup : 20€</li>
                    <li>Tee shirt, tote bag et éco-cup : 13€</li>
                </ul>
                A l’unité :
                <ul>
                    <li>Casquette : 7€</li>
                    <li>Tote bag : 4€</li>
                    <li>Tee-shirt : 9€</li>
                    <li>Eco-cup : 1.5€</li>
                </ul>
                <div class="box alt">
                    <div class="row 50% uniform">
                        <div class="4u"><span class="image fit"><img src="images/boutique1.jpeg"
                                                                     alt=""/></span>
                        </div>
                        <div class="4u"><span class="image fit"><img src="images/boutique2.jpeg"
                                                                     alt=""/></span>
                        </div>
                        <div class="4u$"><span class="image fit"><img src="images/boutique3.jpeg"
                                                                      alt=""/></span>
                        </div>
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
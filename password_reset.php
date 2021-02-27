<?php
include '_db.php';
include 'server.php';
$selector = $_GET["selector"];
$validator = $_GET["validator"];
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Réinitialiser mon mot de passe 🚀</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css"/>
    </noscript>
    <link rel="shortcut icon" sizes="57x57" href="images/logo.png">
</head>
<body class="landing is-preload">
<!-- Page Wrapper -->
<div id="page-wrapper">
    <!-- Header -->
    <header id="header" class="alt">
        <h1><a href="index">🚀Internium by SpaceX🚀</a></h1>
        <nav id="nav">
            <ul>
                <li class="special">
                    <a href="#menu" class="menuToggle"><span>Menu</span></a>
                    <div id="menu">
                        <ul>
                            <li></li>
                            <li><a href="index">Accueil</a></li>
                            <li><a href="orga_team">Internium Team</a></li>
                            <li><a href="partners">Partenaires</a></li>
                            <li><a href="signup">Créer mon compte</a></li>
                            <li><a href="signin">Connexion</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <header>
        <h2>🚀Internium by SpaceX🚀</h2>
    </header>
    <!-- Main -->
    <article id="main">
        <section class="wrapper style4">
            <div class="inner">
                <section>
                    <h3><b>Réinitialiser mon mot de passe</b></h3><br/><br/>
                    <form method="post" action="">
                        <?php include('_error.php'); ?>
                        <div class="row gtr-uniform">
                            <input type="hidden" id="selector" name="selector"
                                   value="<?php echo $selector ?>">
                            <input type="hidden" id="validator" name="validator"
                                   value="<?php echo $validator ?>">
                            <div class="row gtr-uniform">
                                <label>Nouveau mot de passe
                                    <div class="col-6 col-12-xsmall">
                                        <input type="password" name="password_1" placeholder="******" maxlength="100"
                                               required/>
                                    </div>
                                </label>
                                <label>Confirmer le mot de passe
                                    <div class="col-6 col-12-xsmall">
                                        <input type="password" name="password_2" placeholder="******" maxlength="100"
                                               required/>
                                    </div>
                                </label>
                                <div class="col-12">
                                    <ul class="actions">
                                        <li><input type="submit" name="password_reset"
                                                   value="Réinitialiser" class="primary"/></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br/><br/>
                </section>
            </div>
        </section>
    </article>
    <?php include '_footer.php' ?>
</div>
<?php include '_scripts.php' ?>
</body>
</html>
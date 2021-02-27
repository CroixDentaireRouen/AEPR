<?php
include '_db.php';
include 'server.php';
?>
<!DOCTYPE HTML>
<html lang="fr">
<head>
    <title>AEPR | Connexion</title>
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
                    <br/><h2><strong>Se connecter</strong></h2>
                </header>
                <b><?php if (isset($_SESSION['message'])) { ?>
                        <div class="msg">
                            <b><p style="background-color:rgb(0,0,255);"><?php echo $_SESSION['message'] ?></p></b>
                        </div>
                    <?php } ?>
                </b><br/>
                <div class="6u$ 12u$(medium)">
                    <form method="post" action="#">
                        <?php include('_error.php'); ?>
                        <div class="row uniform">
                            <label>Nom d'utilisateur ou email
                                <div class="12u$(medium)">
                                    <input type="text" name="username" placeholder="Username / email"
                                           id="username" required/>
                                </div>
                            </label>
                            <label>Mot de passe (<a href="password_forgotten">Mot de passe oublié ?</a>)
                                <div class="12u$(medium)">
                                    <input type="password" name="password" placeholder="Mot de passe" id="password"
                                           required/>
                                </div>
                            </label>
                            <!-- Break -->
                            <div class="12u$">
                                <ul class="actions">
                                    <li><input type="submit" name="login_user" value="Connexion"/></li>
                                    <li><input type="reset" value="Reset" class="alt"/></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
                Nouveau utilisateur ? <a href="signup"><strong>Créer un compte.</strong></a>
            </div>
        </div>
    </div>
</section>
<br/><br/>
<?php
include '_footer.php';
include '_scripts.php'
?>
</body>
</html>
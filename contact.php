<?php
include '_db.php';
include 'server.php';
?>
<!DOCTYPE HTML>
<html lang="fr">
<head>
    <title>AEPR | Contact</title>
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
                    <br/><h2><strong>Contact</strong></h2>
                </header>
                <form method="post" action="#">
                    <div class="row uniform">
                        <div class="6u 12u$(xsmall)">
                            <input type="text" name="name" id="name" value="" placeholder="Name"/>
                        </div>
                        <div class="6u$ 12u$(xsmall)">
                            <input type="email" name="email" id="email" value="" placeholder="Email"/>
                        </div>
                        <!-- Break -->
                        <div class="12u$">
                            <input type="text" name="category" id="category" value="" placeholder="Object"/>
                        </div>
                        <div class="6u 12u$(small)">
                            <input type="checkbox" id="copy" name="copy">
                            <label for="copy">Email me a copy of this message</label>
                        </div>
                        <div class="12u$">
                            <textarea name="message" id="message" placeholder="Enter your message" rows="6"></textarea>
                        </div>
                        <!-- Break -->
                        <div class="12u$">
                            <ul class="actions">
                                <li><input type="submit" value="Send Message"/></li>
                                <li><input type="reset" value="Reset" class="alt"/></li>
                            </ul>
                        </div>
                    </div>
                </form>
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
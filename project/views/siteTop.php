<!DOCTYPE html>
<html>
    <!--
    Like what you see?
    Don't like what you see and want to fix it?
    Visit http://github.com/buhala/breader and contribute something to the project
    Or just rip stuff out.
    I don't mind
    -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>bReader</title>
        <link rel="stylesheet" type="text/css" href="<?= SITE_PATH ?>css/style.css" /> 
        <link rel="stylesheet" type="text/css" href="<?= SITE_PATH ?>css/hack.css" /> 
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

    </head>
    <body>
        <div id="container">
                            <div id="menu">
                                <div id='fakemenu'><img src="<?= SITE_PATH ?>img/logo.png" height="40" alt="bReader"><p id="menu-links"><a href=<?= SITE_PATH ?>redirectionController" id="current">Home</a><a href="<?= SITE_PATH ?>login/destroy_session">Logout</a></p></div>
                </div>

            <div id="content">
                <div id="page">

                    <div id="leftbar">
                        <?php
                        /**
                         * I honestly have no idea if I should access the value directly from the session
                         * But, I call it in so may places that it is better this way
                         */
                        if ($_SESSION['il']) {
                            ?>
                            <h2>Navigation</h2>
                            <h3>Get informed</h3>
                            <a href="<?= SITE_PATH ?>stories">Read stories</a><br>
                            <a href="<?= SITE_PATH ?>stories?sort=new">Read <b>the newest</b> stories</a><br>
							<h3>Customize your experience</h3>
                            <a href="<?= SITE_PATH ?>categories/chooseCategories">Choose your subsciptions</a><br>
							<a href="<?= SITE_PATH ?>user/changeDetails">Change your details</a>
							<h3>Other stuff</h3>
                            <a href="<?=SITE_PATH?>commits">Show changes to the site</a><br>
                            <a href="<?= SITE_PATH ?>help">Help me, I'm lost!</a><br>
                            <a href="<?= SITE_PATH ?>stories/addFeed">Add your own RSS feed!</a><br>

                            <?php
                        }
                        ?>
                        <h2>Advert</h2>
                        <img src="<?= SITE_PATH ?>img/advert.jpg" class="advert">
						<h2>Hosted by</h2>
						<img src="<?=SITE_PATH?>img/icn.png">
                    </div>
                    <div id="rightbar">
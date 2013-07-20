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
        <?php
        //New design, highly experimental, has a lot of bugs, but is overall better
        if (isset($_GET['betterdesign'])) {
            ?> 
            <link rel="stylesheet" type="text/css" href="<?= SITE_PATH ?>css/newdesign.css" /> 

            <?php
        }
        ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>
            $(function() {
                date = new Date();
                hour = date.getHours();
                if (hour >= 21 || hour <= 5) {
                    $('head').append( $('<link rel="stylesheet" type="text/css" />').attr('href', '<?=SITE_PATH?>css/night.css') );
                    $('img[src="<?=SITE_PATH?>img/star.png"]').attr('src','asdfasdf');
                
                }
            });
        </script>
    </head>
    <body>
        <div id="container">
            <div id="menu">
                <div id='fakemenu'><a href="<?=SITE_PATH?>"><img src="<?= SITE_PATH ?>img/logo.png" height="40" alt="bReader"></a><p id="menu-links"><a href=<?= SITE_PATH ?>redirectionController" id="current">Home</a><a href="<?= SITE_PATH ?>login/destroy_session">Logout</a></p></div>
            </div>

            <div id="content">
                <div id="page">

                    <div id="leftbar">
                        <?php
                        /**
                         * I honestly have no idea if I should access the value directly from the session
                         * But, I call it in so may places that it is better this way
                         */
                        if (isset($_SESSION['il'])) {
                            ?>
                            <h2>Navigation</h2>
                            <h3>Get informed</h3>
                            <a href="<?= SITE_PATH ?>stories">Read stories</a><br>
                            <a href="<?= SITE_PATH ?>stories?sort=new">Read <b>the newest</b> stories</a><br>
                            <h3>Customize your experience</h3>
                            <a href="<?= SITE_PATH ?>categories/chooseCategories">Choose your subsciptions</a><br>
                            <?php
                            if ($_SESSION['user'][0]['password'] != 'socialAccount') {
                                ?>
                                <a href="<?= SITE_PATH ?>user/changeDetails">Change your details</a>
                            <?php } ?>
                            <h3>Other stuff</h3>
                            <a href="<?= SITE_PATH ?>commits">Show changes to the site</a><br>
                            <a href="<?= SITE_PATH ?>help">Help me, I'm lost!</a><br>
                            <a href="<?= SITE_PATH ?>stories/addFeed">Add your own RSS feed!</a><br>

                            <?php
                        }
                        ?>
                        <h2>Advert</h2>
                        <img src="<?= SITE_PATH ?>img/advert.jpg" class="advert">
                        <h2>Hosted by</h2>
                        <img src="<?= SITE_PATH ?>img/icn.png">
                    </div>
                    <div id="rightbar">
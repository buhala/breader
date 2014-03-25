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
        <base href="<?=SITE_PATH?>">
        <link rel="stylesheet" type="text/css" href="css/style.css" />

        <link rel="stylesheet" type="text/css" href="css/hack.css" /> 
        <?php
        //New design, highly experimental, has a lot of bugs, but is overall better
        if (isset($_GET['betterdesign'])) {
            ?> 
            <link rel="stylesheet" type="text/css" href="css/newdesign.css" /> 

            <?php
        }
        ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="js/common.js"></script>
    </head>
    <body>
        <div id="container">
            <div id="menu">
                <div id='fakemenu'><a href=""><img src="img/logo.png" height="40" alt="bReader"></a><p id="menu-links"><a href=redirectionController" id="current">Home</a><a href="login/destroy_session">Logout</a></p></div>
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
                            <a href="stories">Read stories</a><br>
                            <a href="stories?sort=new">Read <b>the newest</b> stories</a><br>
                            <h3>Customize your experience</h3>
                            <a href="categories/chooseCategories">Choose your subsciptions</a><br>
                            <?php
                            if ($_SESSION['user'][0]['password'] != 'socialAccount') {
                                ?>
                                <a href="user/changeDetails">Change your details</a>
                            <?php } ?>
                            <h3>Other stuff</h3>
                            <a href="commits">Show changes to the site</a><br>
                            <a href="help">Help me, I'm lost!</a><br>
                            <a href="stories/addFeed">Add your own RSS feed!</a><br>

                            <?php
                            //var_dump($_SESSION);
                            if($_SESSION['user'][0]['type']>0){
                                ?>
                                <h3>Administration</h3>
                                <a href="admin/categoriesManagement">Manage Categories</a><br>
                                <a href="admin/feedManagement">Manage Feeds</a>
                                <?php
                            }
                        }
                        ?>
                        <h2>Advert</h2>
                        <img src="img/advert.jpg" class="advert">
                        <h2>Hosted by</h2>
                        <img src="img/icn.png">
                    </div>
                    <div id="rightbar">

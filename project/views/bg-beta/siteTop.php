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

    </head>
    <body>
        <div id="container">
            <div id="menu">
                <div id='fakemenu'><img src="img/logo.png" height="40" alt="bReader"><p id="menu-links"><a href=redirectionController" id="current">Начало</a><a href="login/destroy_session">Излез</a></p></div>
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
                            <h2>Навигация</h2>
                            <h3>Информирай се</h3>
                            <a href="stories">Чети истории</a><br>
                            <a href="stories?sort=new">Прочети <b>най-новите</b> истории</a><br>
                            <h3>Промени изживяването си</h3>
                            <a href="categories/chooseCategories">Избери категории</a><br>
                            <?php
                            if ($_SESSION['user'][0]['password'] != 'socialAccount') {
                                ?>
                                <a href="user/changeDetails">Промени си детайлите</a>
                            <?php } ?>
                            <h3>Други</h3>
                            <a href="commits">Покажи ми промените по сайта</a><br>
                            <a href="help">Помогни ми, загубих се!</a><br>
                            <a href="stories/addFeed">Добави твой източник!</a><br>

                            <?php
                        }
                        ?>
                        <h2>Реклама</h2>
                        <img src="img/advert.jpg" class="advert">
                        <h2>Хостинг от</h2>
                        <img src="img/icn.png">
                    </div>
                    <div id="rightbar">
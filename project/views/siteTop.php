<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>bReader</title>
         <link rel="stylesheet" type="text/css" href="<?=SITE_PATH?>css/style.css" /> 
          <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    </head>
    <body>
        <div id="container">
            <div id="content">
                <div id="menu">
                    <img src="<?=SITE_PATH?>img/logo.png" height="80" alt="bReader"><p id="menu-links"><a href=<?=SITE_PATH?>redirectionController" id="current">Home</a><a href="<?=SITE_PATH?>login/destroy_session">Logout</a></p>
                </div>
                <div id="page">
                    
                    <div id="leftbar">
                        <h2>Useful links</h2>
                         <a href="<?=SITE_PATH?>stories">Read stories</a><br>
                        <a href="<?=SITE_PATH?>categories/chooseCategories">Choose your subsciptions</a><br>
                        <a href="<?=SITE_PATH?>help">Help me, I'm lost!</a>
                        <h2>Advert</h2>
                        <img src="<?=SITE_PATH?>img/advert.jpg" class="advert">
                    </div>
                    <div id="rightbar">
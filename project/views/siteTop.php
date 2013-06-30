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
                    <img src="<?=SITE_PATH?>img/logo.png" height="80" alt="bReader"><p id="menu-links"><a href="#" id="current">Home</a><a href="#">Something else</a></p>
                </div>
                <div id="page">
                    
                    <div id="leftbar">
                        <h2>Login</h2>
                        <form method="post"><table>
                                <tr><td>Username</td><td style="width:80%"><input type="text" name="username" class="text"></td></tr>
                                <tr><td>Password</td><td><input type="password" name="password" class="text"></td></tr>
                                <tr><td colspan="2"><input class="button" type="submit" name="act" value="Login" style="float:right"></td></tr>
                            </table>
                        </form>
                        <h2>Advert</h2>
                        <img src="<?=SITE_PATH?>img/advert.jpg" class="advert">
                    </div>
                    <div id="rightbar">
<!DOCTYPE html>
<html>
    <!-- 
    Inspired by http://avroraos.herokuapp.com/ . Thanks for the permission :)
    -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/login.css">  
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src='js/home.js'></script>
        <script type="text/javascript">
            (function() {
                if (typeof window.janrain !== 'object')
                    window.janrain = {};
                if (typeof window.janrain.settings !== 'object')
                    window.janrain.settings = {};

                janrain.settings.tokenUrl = 'http://local.breader.eu/api/tokenLogin';

                function isReady() {
                    janrain.ready = true;
                }
                ;
                if (document.addEventListener) {
                    document.addEventListener("DOMContentLoaded", isReady, false);
                } else {
                    window.attachEvent('onload', isReady);
                }

                var e = document.createElement('script');
                e.type = 'text/javascript';
                e.id = 'janrainAuthWidget';

                if (document.location.protocol === 'https:') {
                    e.src = 'https://rpxnow.com/js/lib/breader/engage.js';
                } else {
                    e.src = 'http://widget-cdn.rpxnow.com/js/lib/breader/engage.js';
                }

                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(e, s);
            })();
        </script>
    </head>
    <body>
        <div id="content">
            <form id='login_form' style='display:block'>
                <h1>Влез в bReader</h1>
                <input type="text" name="uname" placeholder="Имейл" class="input" id="username_login" css=""/>
                <input type="password" name="pass" placeholder="Парола" class="input" id="password_login">
                <div class="addons">
                    <a href="#" class="social">Социален вход?</a>
                    <a href="#" class="right forgot" id='forgot'>Не си помниш паролата??</a>
                </div>
                <div class="actions">
                    <input type="submit" name="act" value="Влез" class="button" id="submit_login">
                    или <a href="#" class='register'>Регистрация</a>
                </div>
            </form>
            <form id='register_form' style='display:none'>
                <h1>Регистрирай се в bReader</h1>

                <input type='text' name='uname' placeholder='Имейл' class='input' id="username_register">
                <input type='password' name='pass' placeholder='Парола' class='input' id="password_register">
                <input type='password' name='passrep' placeholder='Пак...' class='input' id="reppassword_register">
                <div class="actions">
                    <input type='submit' name='act' value='Регистрирай се' class='button' id="register_submit">
                    или <a href="#" class='login'>Влез</a>
                </div>
            </form>
            <form id='social_form' style='display:none'>
                <h1>Влез със социален акаунт</h1>
                <center>
                <div id="janrainEngageEmbed"></div>
                </center>
        </div>
    </form>

    <form id='forgot_form' style='display:none'>
        <h1>Забравил си си паролата?</h1>
        <input type='text' name='uname' placeholder='Имейл...' class='input' id="forgot_username">
        <div class="actions">
            <input type='submit' name='act' value='Поискай нова парола' class='button' id="forgot_submit">
            или <a href="#" class='login' >Влез</a>
        </div>

    </form>
</div>
</body>
</html>

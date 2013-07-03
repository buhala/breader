<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" href="<?= SITE_PATH ?>css/login.css">  
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src='<?= SITE_PATH ?>js/home.js'></script>
    </head>
    <body>
        <div id="content">
            <div id='login_form' style='display:block'>
                <h1>Login to bReader</h1>
                <input type="text" name="uname" placeholder="Email" class="input" id="username_login"/>
                <input type="password" name="pass" placeholder="Password" class="input" id="password_login">
                <div class="addons">
                    <input type="checkbox" name="check" class="checkbox left">Remember me?
                    <a href="#" class="right forgot" id='forgot'>Don't remember your password?</a>
                </div>
                <div class="actions">
                    <input type="submit" name="act" value="Login" class="button" id="submit_login">
                    or <a href="#" class='register'>Register</a>
                </div>
            </div>
            <div id='register_form' style='display:none'>
                <h1>Register for bReader</h1>

                <input type='text' name='uname' placeholder='Email' class='input' id="username_register">
                <input type='password' name='pass' placeholder='Password' class='input' id="password_register">
                <input type='password' name='passrep' placeholder='Again...' class='input' id="reppassword_register">
                <div class="actions">
                    <input type='submit' name='act' value='Register' class='button' id="register_submit">
                    or <a href="#" class='login'>Login</a>
                </div>
            </div>
            <div id='forgot_form' style='display:none'>
                <h1>Forgot password?</h1>
                <input type='text' name='uname' placeholder='Email...' class='input' id="forgot_username">
                <div class="actions">
                    <input type='submit' name='act' value='Request password' class='button' id="forgot_submit">
                    or <a href="#" class='login' >Login</a>
                </div>

            </div>
        </div>
    </body>
</html>

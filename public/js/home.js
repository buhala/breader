$(function() {
    
    $('.register').on('click', function() {
        $('#login_form').hide();
        $('#forgot_form').hide();
        $('#register_form').show();
    });
    $('.social').on('click', function() {
        $('#login_form').hide();
        $('#social_form').show();
    });
    $('.login').on('click', function() {
        $('#register_form').hide();
        $('#forgot_form').hide();
        $('#login_form').show();
    });
    $('.forgot').on('click', function() {
        $('#login_form').hide();
        $('#register_form').hide();
        $('#forgot_form').show();
    });
    $('#login_form').on('submit', function() {
        $('body').css('pointer','progress');
        var ajax_setup = {};
        ajax_setup.url = 'login/ajaxLogin';
        ajax_setup.type = 'post';
        ajax_setup.cache = false;
        ajax_setup.data = {};
        ajax_setup.data.username = $('#username_login').val();
        ajax_setup.data.password = $('#password_login').val();
        ajax_setup.dataType = 'json';
        ajax_setup.error = function() {
            console.log('Something is very wrong');

        };
        ajax_setup.success = function(response) {
            console.log(response);
            if (response.success == true) {
                window.location.href = 'redirectionController';
            }
            else {
                if (response.error == 'INVALID_DATA') {
                    alert('Your username/password is wrong!');
                }
            }
        };
        $.ajax(ajax_setup);
        $('body').css('pointer','auto');
        return false;
    });
    $('#register_form').on('submit', function() {
        $('body').css('pointer','progress');
        var ajax_setup = {};
        ajax_setup.url = 'login/ajaxRegister';
        ajax_setup.type = 'post';
        ajax_setup.cache = false;
        ajax_setup.data = {};
        ajax_setup.data.username = $('#username_register').val();
        ajax_setup.data.password = $('#password_register').val();
        ajax_setup.data.reppassword = $('#reppassword_register').val();
        ajax_setup.dataType = 'json';
        ajax_setup.error = function() {
            console.log('Something is very wrong');

        };
        ajax_setup.success = function(response) {
            console.log(response);
            if (response.success == true) {
                alert('You have been registered. You can now login!');
                window.location.href = 'login';
            }
            else {
                if (response.error == 'INVALID_MAIL') {
                    alert('Your email adress is invalid!');
                }
                if (response.error == 'EMAIL_EXISTS') {
                    alert('This email already exists in our database');
                }
                if (response.error == 'SHORT_PASS') {
                    alert('Your password is too short. It must be at least 5 characters');
                }
                if (response.error == 'PASSWORD_MISMATCH') {
                    alert('Your passwords do not match!');
                }
            }
        };
        $.ajax(ajax_setup);
        $('body').css('pointer','auto');
        return false;
    });
    $('#forgot_form').on('submit', function() {
        $('body').css('pointer','progress');
        var ajax_setup = {};
        ajax_setup.url = 'login/ajaxForgotPassword';
        ajax_setup.type = 'post';
        ajax_setup.cache = false;
        ajax_setup.data = {};
        ajax_setup.data.username = $('#forgot_username').val();
        ajax_setup.dataType = 'json';
        ajax_setup.error = function() {
            console.log('Something is very wrong');

        };
        ajax_setup.success = function(response) {
            console.log(response);
            if (response.success == true) {
                alert('You have been sent an email containing further instructions');
                //window.location.href='login';              
            }
            else {
                alert('Your user does not exist');
            }
        };
        $.ajax(ajax_setup);
        $('body').css('pointer','auto');
        return false;
    });
});

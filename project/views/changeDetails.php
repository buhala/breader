<h2>Change password</h2>
<form method='post' action='<?=SITE_PATH?>user/doPassChange'>
    <?php
    if($data['type']==1){
        if($data['success']==false){
            if($data['error']=='OLD_PASSWORD_MISMATCH'){
                echo 'Your old password does not match!';
            }
            else{
                echo 'Your new password does not match the repeat!';
            }
        }
        else{
            echo 'Password changed successfully';
        }
    }
    ?>
    <table>
        <tr><td>Enter (current) password</td><td><input type='password' name='curpass'></td></tr>
        <tr><td>Enter new password</td><td><input type='password' name='newpass'></td></tr>
        <tr><td>Enter new password again</td><td><input type='password' name='newpassrep'</td></tr>
        <tr><td colspan='2' style='text-align: center'><input type='submit' name='act' value='Change pass'></td></tr>
    
</form>
<tr><td colspan='2'><h2>Change Email</h2></td></tr>
<form method='post' action='<?=SITE_PATH?>user/doEmailChange'>
    
        <tr><td>Enter new email:</td><td><input type='text' name='email'></td></tr>
        <tr><td colspan='2' style='text-align: center'><input type='submit' name='act' value='Change email'></td></tr>
    </table>
</form>
<div style='padding-bottom:600px'></div>
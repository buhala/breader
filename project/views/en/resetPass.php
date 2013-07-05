<?php

if ($data['success'] == false) {
    //There is only one error
    echo 'Your key is non-existent';
} else {
    //print_r($data['key']);
    echo '<form method="post" action="' . SITE_PATH . 'login/newPass/' . $data['key']['key'] . '">
        <table style="padding-bottom:600px;"><tr><td>New password:</td><td><input type="password" name="newpass"></td></tr>
        <tr><td>Repeat:</td><td><input type="password" name="reppass"></td></tr>
        <tr><td><input type="submit" name="act" value="Change password"></td></tr></table>
</form>';
}
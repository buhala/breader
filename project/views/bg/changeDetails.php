<h2>Смени паролата</h2>
<form method='post' action='<?= SITE_PATH ?>user/doPassChange'>

    <?php
    if ($data['type'] == 1) {
        if ($data['success'] == false) {
            if ($data['error'] == 'OLD_PASSWORD_MISMATCH') {
                echo 'Старата ти парола не съвпада!';
            } else {
                echo 'Новата парола не съвпада с повторението!';
            }
        } else {
            echo 'Паролата е сменена успешно';
        }
    }
    ?>
    <table>
        <tr><td>Въведи сегашна парола</td><td><input type='password' name='curpass'></td></tr>
        <tr><td>Въведи нова парола</td><td><input type='password' name='newpass'></td></tr>
        <tr><td>Въведи нова парола отново</td><td><input type='password' name='newpassrep'</td></tr>
        <tr><td colspan='2' style='text-align: center'><input type='submit' name='act' value='Смени парола'></td></tr>

</form>

<tr><td colspan='2'><h2>Смени имейл</h2></td></tr>
<tr><td colspan='2'>
<?php
if ($data['type'] == 2) {
    if ($data['success'] == false) {
        echo 'Имейла ви е невалиден'; //Only one error message
    } else {
        echo 'Имейла ви е сменен успешно!';
    }
}
?>
    </td>
</tr>
<form method='post' action='<?= SITE_PATH ?>user/doEmailChange'>

    <tr><td>Въведи нов имейл:</td><td><input type='text' name='email'></td></tr>
    <tr><td colspan='2' style='text-align: center'><input type='submit' name='act' value='Смени имейла'></td></tr>
</table>
</form>
<div style='padding-bottom:600px'></div>
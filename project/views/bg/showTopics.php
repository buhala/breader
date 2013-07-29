<h2>Read some of our articles</h2>
<ol>
    <?php
    foreach ($data as $entry) {
        echo '<li><a href="' . SITE_PATH . 'help/viewArc/' . $entry->id . '"><u>' . $entry->topic . '</u></a></li>';
    }
    ?>
</ol>
<h2>Contact support</h2>
<form method="post" action="help/submitRequest">
    <table>
        <tr>
            <td>Email:</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Message title</td>
            <td><input type="text" name="title"></td>
        </tr>
        <tr>
            <td>Message content</td>
            <td><textarea rows="5" cols="40" name="msg"></textarea></td>
        </tr>
        <tr>
            <td><input type="submit" name="act" value="Send message"></td>
        </tr>
    </table>
</form>
<div style="padding:300px"></div>
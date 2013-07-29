<?php
if ($data['success'] == true) {
    echo '<script>alert("Вашия източник чака удобрение");</script>';
} elseif ($data['success'] == false && isset($data['success'])) {
    echo '<script>alert("Линка към източнока ви е прекалено кратък")</script>';
}
?>
<form method="post" action="stories/addFeed" style="padding-bottom:600px">
    <table>
        <tr>
            <td>Избери категория</td><td>
                <select name="cat">
                    <?php
                    //Easter egg:I like cats
                    foreach ($data as $cat) {
                        echo '<option value="' . $cat->id . '">' . $cat->name . '</option>';
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td>Линк към източника:</td>
            <td><input type="text" name="url"></td>
        </tr>
        <tr><td><input type="submit" name="act" value="Прати за удобрение"></td></tr>
    </table>    
</form>
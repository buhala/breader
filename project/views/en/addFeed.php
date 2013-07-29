<?php
if ($data['success'] == true) {
    echo '<script>alert("Your feed has been submitted for approval");</script>';
} elseif ($data['success'] == false && isset($data['success'])) {
    echo '<script>alert("Your feed URL is too short")</script>';
}
?>
<form method="post" action="stories/addFeed" style="padding-bottom:600px">
    <table>
        <tr>
            <td>Choose category</td><td>
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
            <td>RSS URL:</td>
            <td><input type="text" name="url"></td>
        </tr>
        <tr><td><input type="submit" name="act" value="Submit for approval"></td></tr>
    </table>    
</form>
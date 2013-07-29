<?php
if ($data['success'] == true) {
    echo '<script>alert("Паролата ви е сменена!");
        var back=0;</script>';
} else {
    echo '<script>alert("Паролите ви не съвпадат"); 
        var back=1</script>';
}
?>
<script>
    if (back == 1) {
        window.history.back();
    }
    else {
        window.location.href = "redirectionController";
    }
</script>
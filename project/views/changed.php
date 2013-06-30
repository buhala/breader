<?php
if($data['success']==true){
    echo '<script>alert("Your password has been changed!");
        var back=0;</script>';
}
else{
    echo '<script>alert("You passwords do not match!"); 
        var back=1</script>';
}
?>
<script>
    if(back==1){
           window.history.back();
    }
    else{
            window.location.href="<?=SITE_PATH?>redirectionController";
    }
</script>
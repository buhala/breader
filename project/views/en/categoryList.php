<script src="<?=SITE_PATH?>js/categories.js"></script>
<div id="profilepicker" ><h2>Choose profile</h2><form  ><select id="profile" disabled><option id="loading">Loading...</option></select></form></div>    
<div id="savenew" style="display:none"><b>Warning:</b>You cannot undo this action<br><input id="profileName" placeholder="Enter profile name..."><br><button id="save">Save changes</button></div>
<div style="padding-bottom:600px"><h2>Choose categories to subscribe to</h2><form method="post" action="<?=SITE_PATH?>categories/change">
<?php
        //Lists alll categories
foreach ($data['categories'] as $category) {
    $attr = '';
    $category->rate=0;
    foreach ($data['likes'] as $like) {

        if ($like->cat_id == $category->id) {
            $attr = 'checked';
            $category->rate=$like->popularity;
        }
    }
    echo '<input type="checkbox" id="'.$category->id.'" class="selector" name="' . $category->id . '" value="1" ' . $attr . '><label for="'.$category->id.'">' . $category->name . '-'.$category->rate.' LikeRank</label><br>';
}
echo '<input type="submit" name="act" value="Choose categories"></form></div>';

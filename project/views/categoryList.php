<?php
echo '<form method="post" action="'.SITE_PATH.'categories/change">';
//Lists alll categories
foreach($data['categories'] as $category){
    $attr='';
    foreach($data['likes'] as $like){
        
        if($like->cat_id==$category->id){
            $attr='checked';
        }
    }
    echo '<input type="checkbox" name="'.$category->id.'" value="1" '.$attr.'>'.$category->name.'<br>';
}
echo '<input type="submit" name="act" value="Save changes"></form>';
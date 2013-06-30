<?php
foreach($data as $entry){
    //It is with GET so we don't fuck everything UP
    echo '<h3><a href="'.SITE_PATH.'link/visit/'.$entry->cat_id.'?url='.urlencode($entry->link).'">'.$entry->title.'</a></h3>'.strip_tags($entry->description).'<hr>';
}
<?php
foreach($data as $entry){
    echo '<h3><a href="'.$entry->link.'">'.$entry->title.'</a></h3>'.strip_tags($entry->description).'<hr>';
}
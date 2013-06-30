<?php
foreach($data as $entry){
    echo '<h3><a href="'.$entry->link.'">'.$entry->title.'</a></h3>'.$entry->description.'<hr>';
}
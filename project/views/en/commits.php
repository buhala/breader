<center><b>Warning:</b>Some of theese changes might not be on the website yet. You may have to wait to see them.</center>
<?php
foreach($data as $entry){
    echo '<h3><a href="'.$entry->html_url.'">Github Commit:'.$entry->sha.'</a></h3>
          <b>Description</b>:'.$entry->commit->message.'<br>
              <small>Commited on:'.$entry->commit->committer->date.'<a href="'.$entry->html_url.'"><u>More info</u></a></small><hr>';
    
}
<center><b>Внимание:</b>Някой от тези промени може да не са в системата. Може да трябва да изчакате за да ги видите</center>
<?php
foreach($data as $entry){
    echo '<h3><a href="'.$entry->html_url.'">Github Commit:'.$entry->sha.'</a></h3>
          <b>Описание</b>:'.$entry->commit->message.'<br>
              <small>Публикувано на:'.$entry->commit->committer->date.'<a href="'.$entry->html_url.'"><u>Повече информация</u></a></small><hr>';
    
}
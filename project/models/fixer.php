<?php

if ($handle = opendir('.')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            $file = file_get_contents($entry);
            $file = str_replace("use b_model;", "use b_model;", $file);
            file_put_contents($entry, $file);
        }
    }
    closedir($handle);
}
?>
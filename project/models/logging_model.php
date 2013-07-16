<?php

/**
 * Logs all the nessesary stuff
 */
class logging_model { 
	use b_model;

    /**
     * 
     * @param type $cat
     * @param type $id
     * Logs a visit
     */
    public function logVisit($cat, $id) {
        $this->database->query('SELECT * FROM likings WHERE user_id=' . $id . ' AND cat_id=' . $cat);
        if ($this->database->getRows() < 1) {
            $this->database->query('INSERT INTO likings (user_id,cat_id,type)
                VALUES(' . $id . ',' . $cat . ',1)');
        }
        $this->database->query('UPDATE likings SET popularity=popularity+1 WHERE user_id=' . $id . ' AND cat_id=' . $cat);
    }

    public function logClick($url, $id) {
        $this->database->query('INSERT INTO clicks (url,user_id,time)
            VALUES("' . $this->database->escape($url) . '",' . $id . ',' . time() . ')');
        echo 'INSERT INTO clicks (url,user_id,time)
            VALUES("' . $this->database->escape($url) . '",' . $id . ',' . time() . ')';
        echo $this->database->getError();
    }

}
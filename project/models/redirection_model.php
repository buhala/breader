<?php

/**
 * Model for redirectioncontroller
 *
 * @author buhala
 */
class redirection_model { 
	use b_model;

    public function checkForLikes($data) {
        $this->database->query('SELECT id FROM likings WHERE user_id=' . $data['user'][0]['id']);
        if ($this->database->getRows() > 0) {
            return true;
        } else {
            return false;
        }
    }

}


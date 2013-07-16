<?php

/**
 * Model for handling login
 */
class login_model { 
	use b_model;

    /**
     * 
     * @param type $data
     * @return type
     * Escapes nessesary data
     */
    public function escapeData($data) {
        $return['username'] = $this->database->escape($data['username']);
        $return['password'] = $this->hash->h($data['password']);
        return $return;
    }

    /**
     * 
     * @param type $data
     * @return boolean
     * Checks if data is valid
     */
    public function checkData($data) {

        $this->database->query('SELECT * FROM users WHERE username="' . $data['username'] . '" AND password="' . $data['password'] . '"');
        if ($this->database->getRows() == 1) {
            return true;
        } else {

            return false;
        }
    }

    /**
     * Creates the session for the user
     */
    public function createSession() {

        $_SESSION['user'] = $this->database->returnArray();
        $_SESSION['il'] = true;
    }

}
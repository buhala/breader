<?php

/**
 * Model for forgot password
 *
 * @author buhala
 */
class forgot_model { 
	use b_model;

    /**
     * 
     * @param type $data
     * @return type
     * Escapes the data
     */
    public function escapeData($data) {
        $return['username'] = $this->database->escape($data['username']); //For consistency's sake
        return $return;
    }

    public function escapeKey($key) {
        $return['key'] = $this->database->escape(trim($key));
        return $return;
    }

    public function checkKey($key) {
        $this->database->query('SELECT * FROM users WHERE `key`="' . $key['key'] . '" AND password!="socialAccount"');
        //  echo 'SELECT * FROM users WHERE `key`="' . $key['key'] . '" AND password!="socialAccount"';
        if ($this->database->getRows() > 0) {
            $return['success'] = true;
        } else {
            $return['success'] = false;
            $return['error'] = 'INVALID_KEY';
        }
        return $return;
    }

    public function validateData($data) {
        if (filter_var($data['username'], FILTER_VALIDATE_EMAIL) == false) {
            $return['success'] = false;
            $return['error'] = 'INVALID_MAIL';
        } else {
            $this->database->query('SELECT * FROM users WHERE username="' . $data['username'] . '"');
            if ($this->database->getRows() > 0) {
                $return['success'] = true;
            } else {
                $return['success'] = false;
                $return['error'] = 'ACCOUNT_NOT_EXIST';
            }
        }
        return $return;
    }

    public function doChange($data) {
        $key = $this->hash->h(rand());
        $this->database->query('UPDATE users SET `key`="' . $key . '" WHERE username="' . $data['username'] . '"');
        //echo 'UPDATE users SET `key`="'.$key.'" WHERE username="'.$data['username'].'"';

        $return['success'] = true;
        $return['key'] = $key;
        return $return;
    }

    public function changeFinal($passwords, $key) {
        //var_dump($passwords); var_dump($key);
        if ($passwords['newpass'] == $passwords['reppass']) {
            //echo 'UPDATE users SET password="'.$this->hash->h($passwords['newpass']).'" WHERE `key`="'.$this->database->escape($key).'"';
            $this->database->query('UPDATE users SET password="' . $this->hash->h($passwords['newpass']) . '" WHERE `key`="' . $this->database->escape($key) . '"');
            $return['success'] = true;
        } else {
            $return['success'] = false;
            $return['error'] = 'PASSWORD_MISMATCH';
        }
        return $return;
    }

}

?>

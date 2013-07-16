<?php

/**
 * The model for the register
 */
class register_model { 
	use b_model;

    protected $database, $hash;

    /**
     * Shortens libs
     */

    /**
     * 
     * @param type $data
     * @return boolean
     * Validates input data
     */
    public function validateData($data) {
        if ($this->database->getRows('SELECT * FROM users WHERE username="' . $this->database->escape($data['username']) . '" AND password!="socialAccount"')) {
            //This is escaped like this because the actual escape function also hashes the password and should not be called before this one
            $return['success'] = false;
            $return['error'] = 'EMAIL_EXISTS';
        } else {
            if (strlen($data['password']) < 5) {
                $return['success'] = false;
                $return['error'] = 'SHORT_PASS';
            } else {
                if ($data['password'] != $data['reppassword']) {
                    $return['success'] = false;
                    $return['error'] = 'PASSWORD_MISMATCH';
                } else {
                    if (filter_var($data['username'], FILTER_VALIDATE_EMAIL) == false) {
                        $return['success'] = false;
                        $return['error'] = 'INVALID_MAIL';
                    } else {
                        $return['success'] = true;
                    }
                }
            }
        }
        return $return;
    }

    /**
     * 
     * @param type $data
     * @return type
     * Escapes nessesary data. Also strips the repeated password
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
     * Inserts data into DB
     */
    public function doRegister($data) {
        $this->database->query('INSERT INTO users(username,password)
                                VALUES("' . $data['username'] . '","' . $data['password'] . '")');
        return true;
    }

}

?>

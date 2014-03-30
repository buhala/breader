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
                if ($data['password'] != $data['reppassword']) {
                    $return['success'] = false;
                    $return['error'] = 'PASSWORD_MISMATCH';
                } else {
                    if (filter_var($data['username'], FILTER_VALIDATE_EMAIL) == false) {
                        $return['success'] = false;
                        $return['error'] = 'INVALID_MAIL';
                    } else {
                        $time=time()-1200;
                        if($this->database->getRows('SELECT * FROM users WHERE register_ip="'.$_SERVER['REMOTE_ADDR'].'" AND register_time>'.$time)<1){ //Check if there are more than 10 accounts in the last 20 minutes from that IP 
                            echo $this->database->getError();
                            $return['success'] = true;
                        }
                        else{
                            $return['success'] = false;
                            $return['error'] = 'TOO_MANY_ACCOUNTS';
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
        $this->database->query('INSERT INTO users(username,password,register_time,register_ip)
                                VALUES("' . $data['username'] . '","' . $data['password'] . '",now(),"'.$this->database->escape($_SERVER['REMOTE_ADDR']).'")');
        return true;
    }

}

?>

<?php

class user_model { 
	use b_model;
    /**
    *@param int id
    *@param str oldpass
    *@return array return
    *Checks the old password
    **/
    public function checkOldPass($id, $oldpass) {
        $this->database->query('SELECT id FROM users WHERE id=' . $id . ' AND password="' . $this->hash->h($oldpass) . '"');
        if ($this->database->getRows() > 0) {
            $return['success'] = true;
        } else {
            $return['success'] = false;
            $return['error'] = 'OLD_PASSWORD_MISMATCH';
        }

        return $return;
    }
    /**
    * @param str newpass
    * @param int id
    * @return array return
    * Changes the password
    */
    public function doChange($newpass, $id) {
        $this->database->query('UPDATE users SET password="' . $this->hash->h($newpass) . '" WHERE id=' . $id);
        $return['success'] = true;
        return $return;
    }
    /**
    * @param str pas
    * @param str oldpass
    * @return array return
    * Checks if passwords match
    **/
    public function checkMatch($pass, $otherpass) {
        if ($pass == $otherpass) {
            $return['success'] = true;
        } else {
            $return['success'] = false;
            $return['error'] = 'NEWPASS_MISMATCH';
        }
        return $return;
    }
    /**
    * @param str email
    * @return array return
    * Checks if the mail is valid.
    **/
    public function validateEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $return['success'] = true;
        } else {
            $return['success'] = false;
            $return['error'] = 'INVALID_MAIL';
        }
        return $return;
    }
    /**
    * @param str email
    * @param int id
    * @return array
    * Changes the email
    * 
    **/
    public function changeEmail($email, $id) {
        $this->database->query('UPDATE users SET username="' . $this->database->escape($email) . '" WHERE id=' . $id);
        $return['success'] = true;
        return $return;
    }

}

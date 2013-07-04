<?php

class user_model extends b_model {

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

    public function doChange($newpass, $id) {
        $this->database->query('UPDATE users SET password="' . $this->hash->h($newpass) . '" WHERE id=' . $id);
        $return['success'] = true;
        return $return;
    }

    public function checkMatch($pass, $otherpass) {
        if ($pass == $otherpass) {
            $return['success'] = true;
        } else {
            $return['success'] = false;
            $return['error'] = 'NEWPASS_MISMATCH';
        }
        return $return;
    }

}

<?php

//Handling categories
class categories_model { 
	use b_model;

    /**
     * 
     * @return object
     * Gets a list of categories
     */
    public function getCategoryList() {
        $r = $this->database->query('SELECT * FROM `categories`');

        $rs = $this->database->returnObject();
        return $rs;
    }

    /**
     * 
     * @return object
     * Gets all the likes of a user
     */
    public function getUserLikes($id) {
        //   echo '<pre>';
        // var_dump($_SESSION);
        $this->database->query('SELECT cat_id,popularity FROM `likings` WHERE `user_id`=' . $id . ' AND type=1'); //Voluntary likes
        // var_dump($q);
        $rs = $this->database->returnObject();
        //var_dump($rs);
        return $rs;
    }

    /**
     * 
     * @param type $id
     * @return boolean
     * Deletes all likes.
     */
    public function deleteUserLikes($id) {
        $this->database->query('DELETE FROM `likings` WHERE `user_id`=' . $id . ' AND type=1'); //Voluntary likes only
        return true;
    }

    /**
     * 
     * @param type $id
     * @return type
     * Gets a profile of a user
     */
    public function getProfiles($id) {
        $this->database->query('SELECT id,name FROM profiles WHERE user_id=' . $id);
        return $this->database->returnObject();
    }

    public function getProfile($id) {
        $this->database->query('SELECT * FROM profiles WHERE id=' . $id);
        return $this->database->returnObject()[0];
    }

    /**
     * 
     * @param type $id
     * @param type $data
     * Sets the new likes of a user
     */
    public function setNewLikes($id, $data) {
        unset($data['act']); //Don't mess with it afterwards
        $query = 'INSERT INTO `likings` (user_id,cat_id,type) VALUES';
        foreach ($data as $key => $one) {
            $query.='(' . $id . ',' . $key . ',1),';
        }
        $final_q = substr($query, 0, strlen($q) - 1);
        $this->database->query($final_q);
    }

    /**
     * 
     * @param type $cat_id
     * @param type $uid
     * Disables a recommendation
     */
    public function disableRecommendation($cat_id, $uid) {
        $this->database->query('INSERT INTO `likings` (cat_id,user_id,type)
            VALUES(' . $cat_id . ',' . $uid . ',0)');
    }

    public function writeProfile($id, $cat, $name) {
        $this->database->query('INSERT INTO profiles (user_id,cats,name)
            VALUES(' . $id . ',"' . $this->database->escape($cat) . '","' . $this->database->escape($name) . '")');
        $return['success'] = true;
        return $return;
    }

}
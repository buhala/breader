<?php

//Handling categories
class categories_model extends b_model {

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

    public function setNewLikes($id, $data) {
        unset($data['act']); //Don't mess with it afterwards
        $query = 'INSERT INTO `likings` (user_id,cat_id,type) VALUES';
        foreach ($data as $key => $one) {
            $query.='(' . $id . ',' . $key . ',1),';
        }
        $final_q = substr($query, 0, strlen($q) - 1);
        $this->database->query($final_q);
    }

    public function disableRecommendation($cat_id, $uid) {
        $this->database->query('INSERT INTO `likings` (cat_id,user_id,type)
            VALUES(' . $cat_id . ',' . $uid . ',0)');
    }

}
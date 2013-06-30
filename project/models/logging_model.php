<?php
/**
 * Logs all the nessesary stuff
 */
class logging_model extends b_model{
    /**
     * 
     * @param type $cat
     * @param type $id
     * Logs a visit
     */
    public function logVisit($cat,$id){
        $this->database->query('UPDATE likings SET popularity=popularity+1 WHERE user_id='.$id.' AND cat_id='.$cat);
        
    }
}
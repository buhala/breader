<?php

/**
 * Database handling
 */
class database {

    use b_library;

    protected $host, $username, $password, $query, $db, $ref, $autoconnect;

    /**
     * Connects to database if autoconnect
     */
    public function __construct() {

        $this->setVars();
        if ($this->autoconnect == true) {
            $this->connect();
        }
    }

    /**
     * 
     * @return type
     * Start DB connection
     */
    public function connect() {
        $this->ref = mysqli_connect($this->host, $this->username, $this->password, $this->db) or die('Check MySQL Connection');
        return $this->ref; //For development purposes;
    }

    /**
     * 
     * @param type $string
     * @return type
     * Escapes a string
     */
    public function escape($string) {
        $this->checkConnection();
        $rs = mysqli_real_escape_string($this->ref, $string);
        //echo "\n\n\n\n\n".'RESULT:'.$rs;
        return $rs;
    }

    /**
     * 
     * @return type
     * Gets the error
     */
    public function getError() {
        //$this->checkConnection();
        return $this->ref->error;
    }

    /**
     * 
     * @param type $query
     * @return type
     * Executes a query
     */
    public function query($query) {
        // $query=(String)$query; //I have no idea why but sometimes this gets an object attached to it
        //echo "\n\n\n QUERY $query \n\n\n";
        $this->checkConnection();
        // echo '<pre>';
        //var_dump($query);

        $this->query = $this->ref->query($query);
        return $this->query;
    }

    /**
     * 
     * @param type $query
     * @return type
     * Gets the num_rows;
     */
    public function getRows($query = null) {
        $this->checkConnection();
        if ($query == null) {
            $result = $this->query;
        } elseif (is_object($query)) {
            $result = $query;
        } else {

            $result = $this->query($query);
        }
        //echo "\n\n\nNum rows for query: $query are".$result->num_rows."\n\n\n";
        //echo 'Num rows are '.$result->num_rows;
        return $result->num_rows;
    }

    /**
     * Returns an array
     */
    public function returnArray($query = null) {
        $this->checkConnection();
        if ($query == null) {
            $result = $this->query;
        } elseif (is_object($query)) {
            $result = $query;
        } else {
            $result = $this->query($query);
        }

        if (@mysqli_num_rows($result) != 0) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
        } else {
            $arr = array();
        }
        //echo "";
        return $arr;
    }

    /**
     * 
     * @param type $query
     * @return array
     * Returns an array with objects
     */
    public function returnObject($query = null) {
        $this->checkConnection();
        if ($query == null) {
            $result = $this->query;
        } elseif (is_object($query)) {
            $result = $query;
        } else {
            $result = $this->query($query);
        }

        if (@mysqli_num_rows($result) != 0) {
            $arr = array();
            while ($row = $result->fetch_object()) {
                $arr[] = $row;
            }
        } else {

            $arr = array();
        }
        //echo "";
        return $arr;
    }

    /**
     * Reconnects if need be
     */
    public function checkConnection() {
        if (!mysqli_ping($this->ref)) {
            @$this->connect();
        }
    }

    /**
     * 
     * @return type
     * Disconnects
     */
    public function disconnect() {
        return @mysqli_close($this->ref);
    }

    /**
     * Disconnects on exit
     */
    public function __destruct() {
        $this->disconnect();
    }

}

?>
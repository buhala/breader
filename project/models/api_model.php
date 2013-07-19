<?php

/**
 * The model corresponding to the API
 */
class api_model { 
	use b_model;

    private $apiKey = 'd0dbf3fd35e4c9f4fbc8b6216e23616afb8c9b12';

    /**
     * For ease of access
     */
    public function __construct() {
        $this->setVars();
        $this->api_key = $GLOBALS['config']['extra']['api']['token'];
    }

    /**
     * 
     * @param type $username
     * @param type $password
     * @return boolean
     * gets a key for the user. Usually commented
     */
    public function getKey($username, $password) {
        /* $username = $this->database->escape($username);
          $password = $this->hash->h($password);
          $this->loadModel('login_model');
          $data['username'] = $username;
          $data['password'] = $password;
          $isValid = $this->login_model->checkData($data);
          if ($isValid == false) {
          return false;
          }
          //I am doing this for readability's sake
          else {

          $apiKey = $this->writeKey($username);
          return $apiKey;
          } */
    }

    /**
     * 
     * @param type $token
     * @return type
     * Extracts an email from the token
     */
    public function getEmail($token) {
        $post_data = array('token' => $token,
            'apiKey' => $this->api_key,
            'format' => 'json',
            'extended' => 'false');

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, 'https://rpxnow.com/api/v2/auth_info');
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        $result = curl_exec($curl);

        curl_close($curl);
        $extracted_result = json_decode($result);
        return $extracted_result->profile->email;
    }

    /**
     * 
     * @param type $email
     * @param type $pastQuery
     * Creates a session for a user with a token
     */
    public function tokenLogin($email, $pastQuery = true) {
        if ($pastQuery == false) {
            $this->database->query('SELECT * FROM users WHERE username="' . $this->database->escape($email) . '" AND password="socialAccount"');
        }
        $this->loadModel('login_model');
        $this->login_model->createSession();
    }

    public function tokenRegister($email) {
        $data['username'] = $this->database->escape($email);
        $data['password'] = 'socialAccount';
        $this->loadModel('register_model');
        $this->register_model->doRegister($data);
    }

    /**
     * 
     * @param type $email
     * Checks if the account exists
     */
    public function checkSocialAccount($email) {
        $this->database->query('SELECT * FROM users WHERE username="' . $this->database->escape($email) . '" AND password="socialAccount"');
        return $this->database->getRows();
    }

    //Currently unused
    /*
      private function writeKey($username) {
      $key = $this->hash->h(rand());
      $this->database->query('SELECT * FROM `users` WHERE username="' . trim($this->database->escape($username)) . '"');
      $realKey = $this->database->returnObject()[0]->api_key;
      if (strlen($realKey) < 1) {
      $this->database->query('UPDATE users SET api_key="' . $key . '" WHERE username="' . $username . '"');

      return $key;
      } else {
      return $realKey;
      }
      } */

    /**
     * 
     * @param type $username
     * @return boolean
     * Gets the likes of an user
     */
    public function getUserLikes($username) {
        $this->loadModel('categories_model');
        $this->database->query('SELECT * FROM `users` WHERE username="' . trim($this->database->escape($username)) . '"');
        if ($this->database->getRows() > 0) {

            return $this->categories_model->getUserLikes($this->database->returnObject()[0]->id);
        } else {
            return false;
        }
    }

    /**
     * 
     * @param type $username
     * @return boolean
     * Gets a user's ID
     */
    public function getUserId($username) {
        $this->database->query('SELECT * FROM `users` WHERE username="' . trim($this->database->escape($username)) . '"');
        //echo 'SELECT * FROM `users` WHERE username="' . trim($this->database->escape($username)) . '"';
        if ($this->database->getRows() > 0) {
            return $this->database->returnObject()[0]->id;
        } else {
            return false;
        }
    }

}
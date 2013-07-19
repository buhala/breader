<?php

/**
 * Hashing class
 */
class hash {

    use b_library;

    protected $salt;

    /**
     * Hashing function
     */
    private function doHash($data, $algo) {
        return hash_hmac($algo, $data, $this->salt);
    }

    /**
     * 
     * @param type $data
     * @return type
     * Hashes sha256
     */
    public function sha256($data) {
        return $this->doHash($data, 'sha256');
    }

    /**
     * 
     * @param type $data
     * @return type
     * Hashes md5
     */
    public function md5($data) {
        return $this->doHash($data, 'md5');
    }

    /**
     * 
     * @param type $data
     * @return type
     * Hashes sha1
     */
    public function sha1($data) {
        return $this->doHash($data, 'sha1');
    }

    /**
     * 
     * @param type $data
     * @return type
     * Hashes the default way
     */
    public function h($data) {
        return $this->sha256($data);
    }

}
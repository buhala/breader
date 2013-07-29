<?php

/**
 * Github model, gets data from github API
 */
class github_model { 
	use b_model;

    /**
     * 
     * @param type $user
     * @param type $project
     * @return array
     * Returns an array containing the commits for the GitHub project
     */
    public function getCommits($user, $project) {
        $c = curl_init('https://api.github.com/repos/' . $user . '/' . $project . '/commits');
        $config = array('User-Agent: buhala');
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($c, CURLOPT_HTTPHEADER, $config);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        $rs = curl_exec($c);
        $dumper = json_decode($rs);
        return $dumper;
    }

}
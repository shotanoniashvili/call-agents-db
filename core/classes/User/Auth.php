<?php

Class Auth {
    public function __construct() {
        $this->uid = -1;
        $this->logged_in = false;

        if(isset($_SESSION['uid'])) {
            $this->uid = $_SESSION['uid'];
            if(count($this->get_current_user()) > 0) {
                $this->logged_in = true;
            }
        }
    }

    public function check_login($username, $password) {
        global $db;

        $username = $db->escape($username);
        $password = md5($password);

        $db->where('user_name', $username);
        $db->where('user_pass', $password);
        $results = $db->getOne('users');

        if($db->count > 0) {
            $_SESSION['uid'] = $results['user_id'];
            return true;
        }
        return false;
    }

    public function get_current_user() {
        global $db;

        $db->where('user_id', $this->uid);
        $results = $db->getOne('users');

        return $results;
    }

    public static function get_uid() {
        if(isset($_SESSION['uid']))
            return $_SESSION['uid'];

        return -1;
    }

    public static function logout() {
        unset($_SESSION['uid']);
    }
}


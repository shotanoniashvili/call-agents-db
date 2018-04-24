<?php

class UserRole {
    public function __construct($role_id) {
        global $db;

        $db->where('role_id', (int)$role_id);
        $result = $db->getOne('user_roles');

        $this->id = $result['role_id'];
        $this->name = $result['role_name'];
    }

    public static function get_role_by_name($name) {
        global $db;

        $db->where('role_name', $db->escape(htmlspecialchars($name)));

        $result = $db->getOne('user_roles');

        if(count($result) == 0) {
            throw new Exception('User role doesn\'t exists with name: '.$db->escape(htmlspecialchars($name)));
        }

        return new UserRole($result['role_id']);
    }
}
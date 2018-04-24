<?php

class User {
    public function __construct($user_id) {
        global $db;

        $db->join('user_roles uroles', "u.user_role = uroles.role_id", "LEFT");
        $db->where('u.user_id', (int)$user_id);
        $result = $db->getOne('users u');

        if(count($result) == 0) {
            throw new Exception('ასეთი მომხმარებელი ვერ მოიძებნა');
        }

        $this->id = $result['user_id'];
        $this->username = $result['user_name'];
        $this->password = $result['user_pass'];
        $this->firstname = $result['user_firstname'];
        $this->lastname = $result['user_lastname'];
        $this->fullname = $this->firstname.' '.$this->lastname;
        $this->role = new UserRole($result['user_role']);
    }

    public function is_admin() {
        return ($this->role->name == 'Administrator');
    }
    public function is_agent() {
        return ($this->role->name == 'Agent');
    }

    public static function is_registered($username) {
        global $db;

        $db->where('user_name', $db->escape(htmlspecialchars($username)));

        $result = $db->get('users');
        return (count($result) > 0);
    }

    public function update() {
        global $db;

        $data = [
            'user_name' => $db->escape(htmlspecialchars($this->username)),
            'user_pass' => $db->escape(htmlspecialchars($this->password)),
            'user_firstname' => $db->escape(htmlspecialchars($this->firstname)),
            'user_lastname' => $db->escape(htmlspecialchars($this->lastname))
        ];

        $db->where('user_id', $this->id);
        return $db->update('users', $data);
    }

    public function remove() {
        global $db;

        $data = ['deleted' => true];

        $db->where('user_id', $this->id);
        return $db->update('users', $data);
    }

    public static function add($firstname, $lastname, $username, $password) {
        global $db;

        $agent_role = UserRole::get_role_by_name('Agent');

        $data = [
            'user_name' => $db->escape(htmlspecialchars($username)),
            'user_pass' => md5($password),
            'user_firstname' => $db->escape(htmlspecialchars($firstname)),
            'user_lastname' => $db->escape(htmlspecialchars($lastname)),
            'user_role' => $agent_role->id
        ];

        return $db->insert('users', $data);
    }

    public static function get_agents() {
        global $db;

        $agent_role = UserRole::get_role_by_name('agent');

        $db->where('deleted', false);
        $db->where('user_role', $agent_role->id);

        $result = $db->get('users', null, 'user_id');
        $agents = [];
        foreach ($result as $agent) {
            $agents[] = new User($agent['user_id']);
        }

        return $agents;
    }
}
<?php

if(isset($_POST['edit-agent'])) {
    $alerts = [];

    if(isset($_POST['first-name']) && !empty($_POST['first-name'])) {
        $firstname = $db->escape(htmlspecialchars($_POST['first-name']));
    } else {
        $alerts[] = 'Please fill firstname field';
    }
    if(isset($_POST['last-name']) && !empty($_POST['last-name'])) {
        $lastname = $db->escape(htmlspecialchars($_POST['last-name']));
    } else {
        $alerts[] = 'Please fill lastname field';
    }
    if(isset($_POST['user-name']) && !empty($_POST['user-name'])) {
        $username = $db->escape(htmlspecialchars($_POST['user-name']));
    } else {
        $alerts[] = 'Please fill username field';
    }

    if(isset($_POST['user-pass']) && !empty($_POST['user-pass'])) {
        $password = $db->escape(htmlspecialchars($_POST['user-pass']));
        $agent->password = md5($password);
    }

    if(!empty($alerts)) {
        $alert->set_type('alert-warning');
        $alert->set_text($alerts);
    } else {
        $agent->firstname = $firstname;
        $agent->lastname = $lastname;
        $agent->username = $username;

        if($agent->update()) {
            $alerts[] = 'Agent successfully updated';
            $alert->set_type('alert-success');
            $alert->set_text($alerts);
        } else {
            $alerts[] = 'Unexpected error while updating an agent';
            $alert->set_type('alert-success');
            $alert->set_text($alerts);
        }
    }
}
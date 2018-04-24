<?php

if(isset($_POST['add-agent'])) {
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

        if(User::is_registered($username)) {
            $alerts[] = 'Username "'.$username.'" already exists in database';
        }
    } else {
        $alerts[] = 'Please fill username field';
    }
    if(isset($_POST['user-pass']) && !empty($_POST['user-pass'])) {
        $password = $db->escape(htmlspecialchars($_POST['user-pass']));
    } else {
        $alerts[] = 'Please fill password field';
    }

    if(!empty($alerts)) {
        $alert->set_type('alert-warning');
        $alert->set_text($alerts);
    } else {
        if(User::add($firstname, $lastname, $username, $password)) {
            $alerts[] = 'Agent successfully added';
            $alert->set_type('alert-success');
            $alert->set_text($alerts);
        } else {
            $alerts[] = 'Unexpected error while adding an agent';
            $alert->set_type('alert-success');
            $alert->set_text($alerts);
        }
    }
}